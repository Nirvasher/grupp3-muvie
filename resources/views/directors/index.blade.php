@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Regissörer</h1>

    <ul>
      @foreach($directors as $director)
        <li><a href="{{ route('directors.show', ['director' => $director->id]) }}">{{ $director->person->name }}</a></li>
      @endforeach
    </ul>
  </div>

@endsection
