@extends('layouts.app')

@section('content')
<div class="container">

  <div class="col-8">
    <table class="table">

    <tr>
      <th><h3>Titel</h3></th>
      <td> {{$movie->title}} @if (Auth::check() && Auth::user()->hasRole('editor'))
      <a class="btn btn-sm btn-primary" href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Ändra</a>
      @endif<br>
    </tr>
    <tbody>
      <tr>
        <th><h3>Beskrivning</h3></th>
        <td> {{$movie->description}}<br></td>
      </tr>
      <tr>
        <th><h3>Speltid</h3></th>
        <td> {{$movie->runtime}}<br></td>
      </tr>
      <tr>
        <th><h3>Releasedatum</h3></th>
        <td>@if ($movie->releasedate < Carbon\Carbon::now())
        {{$movie->releasedate}}
        @else
        Under produktion, släpps {{$movie->releasedate}}
        @endif
        <br></td>
      </tr>
      <tr>
        <th><h3>Genre</h3></th>
        <td>@foreach ($movie->genres as $genre)
        <a href="{{route('genres.show', ['id' => $genre->id])}}">{{$genre->name}}</a><br>
        @endforeach
        @if (Auth::check() && Auth::user()->hasRole('editor'))
        <form action="{{ route('movies.addGenre', ['id' => $movie->id])}}" method="post">
          @csrf
          <select class="form-control" name="genre">
            @foreach ($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
          </select>
          <button type="submit" name="button" class="btn btn-sm btn-primary">Lägg till genre</button>
        </form>
        @endif</td>
      </tr>

      <tr>
        <th><h3>Regissör</h3></th>
        <td>@empty($movie->director)
        -
        @else
        <a href="{{route('directors.show', ['id' => $movie->director->id])}}">{{$movie->director->person->name}}</a>
        @endempty</td>
      </tr>
      <tr>
        <th><h3>Skådespelare</h3></th>
        <td>@foreach ($movie->actors as $actor)
        <a href="{{route('actors.show', ['id' => $actor->id])}}">{{$actor->person->name}}</a><br>
        @endforeach
        @if (Auth::check() && Auth::user()->hasRole('editor'))
        <a href="{{route('actors.add', ['id' => $movie->id])}}" class="btn btn-sm btn-primary">Lägg till skådespelare</a>
        @endif</td>
      </tr>

      <tr>
        @auth
        <th><h3>Betygsätt</h3></th>
        <td><form action="{{route('ratings.store', ['id' => $movie->id])}}" method="post">
          @csrf
          <select class="form-control" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <button type="submit" name="button" class="btn btn-sm btn-primary">Lägg till betyg</button>
        </form>
        @endauth</td>
      </tr>
      <tr>
        <th><h3>Samlat betyg</h3></th>
        <td><?php
        $countedRatings = $movie->ratings->count();
        $sumRatings = 0;
        foreach ($movie->ratings as $rating) {
          $sumRatings += $rating->rating;
        }
        if($countedRatings) {
          $averageRating = $sumRatings/$countedRatings;
          echo $averageRating.'<br>';
          echo 'Antal betyg:'.$countedRatings;
        }
        ?></td>
      </tr>
      <tr>
        <th><h3>Bilder</h3></th>
        <td>
        @foreach ($movie->images as $image)
        <img src="{{ asset('storage/'.$image->url) }}"><br>
        @endforeach
        @if (Auth::check() && Auth::user()->hasRole('editor'))
        <a class="btn btn-sm btn-primary" href="{{ route('images.create', ['movie' => $movie->id]) }}">Lägg till fler bilder</a>
        @endif
        </td>
        </tr>
      </table>
      </div>

  <div class="col-4">
    <table class="table">
      <tr>
        <th><h3>Posterbild</h3></th>
        <td>@empty($movie->image)
        -
        @else
        <img src="{{ asset('storage/'.$movie->image->url) }}"></td>
      </tr><br>

        <tr>
          <td>@auth
          <a class="btn btn-sm btn-primary" href="{{ route('libraries.create', ['movie' => $movie->id]) }}">Lägg till film i biblioteket</a>
          @endauth</td>
        </tr>

          <tr>
          <td>@if (Auth::check() && Auth::user()->hasRole('editor'))
          <a class="btn btn-sm btn-primary" href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Redigera</a>
          @endif</td>
        </tr>
      </table>
    </div>
  </div>
@endsection
