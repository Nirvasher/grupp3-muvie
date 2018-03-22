@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Genrer:</h1>

    <ul class="list-group">
      @foreach($genres as $genre)
        <li class="list-group-item mb-3"><a href="{{ route('genres.show', ['genre' => $genre->id]) }}">{{ $genre->name }}</a></li>
      @endforeach
    </ul>
    @if (Auth::check() && Auth::user()->hasRole('editor'))
    <a href="{{ route('genres.create') }}" class="btn btn-primary">Lägg till ny genre</a>
    @endif
  </div>

@endsection
