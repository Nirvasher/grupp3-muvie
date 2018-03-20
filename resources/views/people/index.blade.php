@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Personer i databasen:</h1>

    <ul>
      @foreach($people as $person)
        <li><a href="{{ route('people.show', ['person' => $person->id]) }}">{{ $person->name }}</a></li>
      @endforeach
    </ul>
  </div>

@endsection
