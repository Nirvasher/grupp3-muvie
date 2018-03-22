@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="row">
        <div class="col-9">
          <h2>{{$movie->title}}</h2>
        </div>
        <div class="col-3">
          @auth
            <a class="btn btn-sm btn-primary float-right" href="{{ route('libraries.create', ['movie' => $movie->id]) }}">Lägg till i biblioteket</a>
          @endauth
        </div>
      </div>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td><strong>Beskrivning</strong></td>
            <td>{{$movie->description}}</td>
          </tr>
          <tr>
            <td><strong>Speltid</strong></td>
            <td>{{$movie->runtime}}</td>
          </tr>
          <tr>
            <td><strong>Releasedatum</strong></td>
            <td>@if ($movie->releasedate < Carbon\Carbon::now())
              {{$movie->releasedate}}
              @else
                Under produktion, släpps {{$movie->releasedate}}
                @endif
            </td>
          </tr>
          <tr>
            <td><strong>Genre</strong></td>
            <td>
              @foreach ($movie->genres as $genre)
                <a href="{{route('genres.show', ['id' => $genre->id])}}">{{$genre->name}}</a><br>
              @endforeach
              @if (Auth::check() && Auth::user()->hasRole('editor'))
                <form action="{{ route('movies.addGenre', ['id' => $movie->id])}}" method="post">
                  @csrf
                  <div class="form-group">
                    <select class="form-control" name="genre">
                      @foreach ($genres as $genre)
                      <option value="{{$genre->id}}">{{$genre->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="button" class="btn btn-sm btn-primary float-right">Lägg till genre</button>
                  </div>
                </form>
              @endif</td>
            </tr>
            <tr>
              <td><strong>Regissör</strong></td>
              <td>
                @empty($movie->director)
                  -
                @else
                  <a href="{{route('directors.show', ['id' => $movie->director->id])}}">{{$movie->director->person->name}}</a>
                @endempty
              </td>
            </tr>
            <tr>
              <td><strong>Skådespelare</strong></td>
              <td>
                @foreach ($movie->actors as $actor)
                  <a href="{{route('actors.show', ['id' => $actor->id])}}">{{$actor->person->name}}</a><br>
                @endforeach
                @if (Auth::check() && Auth::user()->hasRole('editor'))
                  <a href="{{route('actors.add', ['id' => $movie->id])}}" class="btn btn-sm btn-primary float-right">Lägg till skådespelare</a>
                @endif
              </td>
            </tr>
            <tr>
              @auth
              <td><strong>Betygsätt</strong></td>
              <td>
                <form action="{{route('ratings.store', ['id' => $movie->id])}}" method="post">
                  @csrf
                  <div class="form-group">
                    <select class="form-control" name="rating">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="button" class="btn btn-sm btn-primary float-right">Lägg till betyg</button>
                  </div>
                </form>
              @endauth
            </td>
          </tr>
          <tr>
            <td><strong>Medelbetyg</strong></td>
            <td><?php
        $countedRatings = $movie->ratings->count();
        $sumRatings = 0;
        foreach ($movie->ratings as $rating) {
          $sumRatings += $rating->rating;
        }
        $averageRating = 0;
        if($countedRatings) {
          $averageRating = $sumRatings/$countedRatings;
        }
        ?>
        <div class="row">
          <div class="col-6">
            <h4>{{$averageRating}}</h4>
          </div>
          <div class="col-6">
            <h4>Antal betyg: {{$countedRatings}}</h4>
          </div>
        </div>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="row">
      <div class="col-9">
        <h3>Galleri</h3>
      </div>
      <div class="col-3">
        @if (Auth::check() && Auth::user()->hasRole('editor'))
        <a class="btn btn-sm btn-primary float-right" href="{{ route('images.create', ['movie' => $movie->id]) }}">Lägg till fler bilder</a>
        @endif
      </div>
    </div>
      <div class="" style="display: grid; grid-template-columns: auto auto auto auto;">
        @foreach ($movie->images as $image)
        <a href="{{ asset('storage/'.$image->url) }}"><img src="{{ asset('storage/'.$image->url) }}" width="150"></a>
        @endforeach
      </div>
    </div>

  <div class="col-4">
    @empty($movie->image)
      Ingen posterbild
    @else
      <img src="{{ asset('storage/'.$movie->image->url) }}" class="img-fluid">
    @endempty
    @if (Auth::check() && Auth::user()->hasRole('editor'))
    <a class="btn btn-sm btn-primary float-right" href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Redigera film</a>
    @endif
  </div>
  </div>
</div>
@endsection
