@extends('layouts.app')

@section('content')
<div class="container">
<h3>Titel</h3>{{$movie->title}}<br>
<h3>Beskrivning</h3>{{$movie->description}}<br>
<h3>Speltid</h3>{{$movie->runtime}}<br>
<h3>Releasedatum</h3>
@if ($movie->releasedate < Carbon\Carbon::now())
{{$movie->releasedate}}
@else
Under produktion, släpps {{$movie->releasedate}}
@endif
<br>
<h3>Betyget för filmen</h3>
<?php
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
?>
@auth
<h3>Betygsätt</h3>
<form action="{{route('ratings.store', ['id' => $movie->id])}}" method="post">
  @csrf
  <select class="form-control" name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <button type="submit" name="button" class="btn btn-primary">Lägg till betyg</button>
</form>
@endauth
<h3>Posterbild</h3>
@empty($movie->image)
-
@else
<img src="{{ asset('storage/'.$movie->image->url) }}"><br>
@endempty
<h3>Regissör</h3>
@empty($movie->director)
-
@else
<a href="{{route('directors.show', ['id' => $movie->director->id])}}">{{$movie->director->person->name}}</a>
@endempty
<h3>Skådespelare</h3>
@foreach ($movie->actors as $actor)
<a href="{{route('actors.show', ['id' => $actor->id])}}">{{$actor->person->name}}</a><br>
@endforeach
@if (Auth::check() && Auth::user()->hasRole('editor'))
<a href="{{route('actors.add', ['id' => $movie->id])}}" class="btn btn-primary">Lägg till skådespelare</a>
@endif
<h3>Genrer</h3>
@foreach ($movie->genres as $genre)
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
  <button type="submit" name="button" class="btn btn-primary">Lägg till genre</button>
</form>
@endif
<h3>Bilder</h3>
@foreach ($movie->images as $image)
<img src="{{ asset('storage/'.$image->url) }}"><br>
@endforeach
@if (Auth::check() && Auth::user()->hasRole('editor'))
<a class="btn btn-primary" href="{{ route('images.create', ['movie' => $movie->id]) }}">Lägg till fler bilder</a>
@endif
@auth
<a class="btn btn-primary" href="{{ route('libraries.create', ['movie' => $movie->id]) }}">Lägg till i biblioteket</a>
@endauth

@if (Auth::check() && Auth::user()->hasRole('editor'))
<a class="btn btn-primary" href="{{ route('movies.edit', ['movie' => $movie->id]) }}">Ändra</a>
@endif
</div>
@endsection
