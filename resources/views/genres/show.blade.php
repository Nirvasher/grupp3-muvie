@extends('layouts.app')
@section('content')

<div class="container">

<h1>Genre: {{ $genre->name }}</h1>


@foreach ($genre->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
