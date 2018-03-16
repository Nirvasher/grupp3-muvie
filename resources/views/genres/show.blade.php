@extends('layouts.app')
@section('content')

<div class="container">

<h1>Genre: {{ $genre->name }}</h1>


@foreach ($genre->movies as $movie)
    {{ $movie-title }} <br>
@endforeach

</div>
@endsection
