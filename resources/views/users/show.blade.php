@extends('layouts.app')
@section('content')

<div class="container">

<h1>Profil för: {{ $user->name }}</h1>
<h3>Bibliotek</h3>
@foreach ($user->libraries as $library)
<a href="{{route('movies.show', ['id' => $library->movie->id])}}">{{ $library->movie->title }}</a> Format: {{ $library->format }} <a href="{{route('libraries.edit', ['library' => $library->id])}}" class="btn btn-primary">Ändra</a><br>
@endforeach
<h3>Ratings</h3>
@foreach ($user->ratings as $rating)
<a href="{{route('movies.show', ['id' => $rating->movie->id])}}">{{$rating->movie->title}}</a> Betyg: {{$rating->rating}}<br>
@endforeach
</div>
@endsection
