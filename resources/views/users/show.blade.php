@extends('layouts.app')
@section('content')

<div class="container">
<h1 class="mb-4">Profil för {{ $user->name }} </h1>

<div class="row">
  <div class="col-6">
    <h3>Mina filmer</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Titel</th>
            <th>Format</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($user->libraries as $library)
          <tr>
            <td>
              <a href="{{route('movies.show', ['id' => $library->movie->id])}}">{{ $library->movie->title }}</a>
            </td>
            <td>
              {{ $library->format }}
            </td>
            <td>
              <a href="{{route('libraries.edit', ['library' => $library->id])}}" class="btn  btn-sm btn-primary float-right">Ändra</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <div class="col-6">
      <h3>Betygsatta filmer</h3>
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Titel</th>
          <th>Betyg</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user->ratings as $rating)
        <tr>
          <td>
            <a href="{{route('movies.show', ['id' => $rating->movie->id])}}">{{$rating->movie->title}}</a>
          </td>
          <td>{{$rating->rating}}</td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
