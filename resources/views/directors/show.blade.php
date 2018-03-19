@extends('layouts.app')
@section('content')

<div class="container">

<h1>Skådespelare: {{ $director->name }}</h1>
<p><a href="{{ route('directors.edit', ['director' => $director->id]) }}" class="btn btn-primary">Redigera</a></p>
@foreach ($director->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
