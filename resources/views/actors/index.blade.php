@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Skådespelare:</h1>

    <ul>
      @foreach($actors as $actor)
        <li><a href="{{ route('actors.show', ['actor' => $actor->id]) }}">{{ $actor->name }}</a></li>
      @endforeach
    </ul>
  </div>

@endsection
