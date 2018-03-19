@extends('layouts.app')
@section('content')

<div class="container">

<h1>Skådespelare: {{ $actor->name }}</h1>


@foreach ($actor->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
