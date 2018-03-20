@extends('layouts.app')
@section('content')

<div class="container">

<h1>Regissör: {{ $director->person->name }}</h1>
@foreach ($director->movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
@endforeach

</div>
@endsection
