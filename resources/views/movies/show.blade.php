@extends('layouts.app')

@section('content')
<div class="container">
<h3>Titel</h3>{{$movie->title}}<br>
<h3>Beskrivning</h3>{{$movie->description}}<br>
<h3>Speltid</h3>{{$movie->runtime}}<br>
<h3>Släppt Datum</h3>{{$movie->releasedate}}<br>
<h3>Media ID</h3>{{$movie->media_id}}<br>
<h3>Regissör</h3>
@empty($movie->director)
-
@else
<a href="{{route('directors.show', ['id' => $movie->director->id])}}">{{$movie->director->name}}</a>
@endempty
<h3>Skådespelare</h3>
@foreach ($movie->actors as $actor)
<a href="{{route('actors.show', ['id' => $actor->id])}}">{{$actor->name}}</a><br>
@endforeach
<h3>Genrer</h3>
@foreach ($movie->genres as $genre)
<a href="{{route('genres.show', ['id' => $genre->id])}}">{{$genre->name}}</a><br>
@endforeach
</div>
@endsection
