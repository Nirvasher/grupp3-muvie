@extends('layouts.app')
@section('content')

<div class="container">

<h1>Genre: {{ $genre->name }}</h1>

<p><a href="{{ route('genres.edit', ['genre' => $genre->id]) }}">Redigera</a></p>

@foreach ($genre->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
