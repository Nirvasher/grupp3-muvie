@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>Genre: {{ $genre->name }}</h1>
    </div>
    <div class="col-4">
      @if (Auth::check() && Auth::user()->hasRole('editor'))
      <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-primary float-right">Redigera</a>
      @endif
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Titel</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($genre->movies as $movie)
      <tr>
        <td>
          <a href="{{route('movies.show', ['id' => $movie->id])}}">{{ $movie->title }}</a><br>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
