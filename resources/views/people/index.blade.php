@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Personer i databasen</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Namn</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($people as $person)
        <tr>
          <td><a href="{{ route('people.show', ['person' => $person->id]) }}">{{ $person->name }}</a></td>
          <td><a href="{{ route('people.edit', ['id' => $person->id]) }}" class="btn btn-sm btn-primary float-right">Ändra</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
