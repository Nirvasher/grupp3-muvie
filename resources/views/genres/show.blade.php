@extends('layouts.app')
@section('content')

<div class="container">

<h1>Genre: {{ $genre->name }}</h1>
@if (Auth::check() && Auth::user()->hasRole('editor'))
<p><a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-primary">Redigera</a></p>
@endif
@foreach ($genre->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
