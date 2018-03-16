@extends('layouts.app')
@section('content')

<div class="container">
@foreach ($movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{$movie->title}}</a><br>
@endforeach
</div>
@endsection
