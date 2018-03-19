@extends('layouts.app')
@section('content')

<div class="container">

<h1>Genre: {{ $genre->name }}</h1>

<p><a href="{{ route('genres.edit', ['genre' => $genre->id]) }}">Redigera</a></p>

@foreach ($genre->movies as $movie)
    {{ $movie-title }} <br>
@endforeach

</div>
@endsection
