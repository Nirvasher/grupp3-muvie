@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Skådespelare:</h1>

    <ul>
      @foreach($artists as $artist)
        <li><a href="{{ route('artists.show', ['artist' => $artist->id]) }}">{{ $artist->name }}</a></li>
      @endforeach
    </ul>
  </div>

@endsection
