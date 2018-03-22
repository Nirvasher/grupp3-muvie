@extends('layouts.app')
@section('content')

<div class="container">
<h1 class="mb-4"> {{ $user->name }} </h1>

<div class="row">
  <div class="col-6">
    <table class="table-body">
    <h3>Mina filmer:</h3>
      <table class="table table-striped">
        @foreach ($user->libraries as $library)
          <tr>
            <td>
              <a href="{{route('movies.show', ['id' => $library->movie->id])}}">{{ $library->movie->title }}</a>
            </td>
            <td>
              Format: {{ $library->format }} <a href="{{route('libraries.edit', ['library' => $library->id])}}" class="btn  btn-sm btn-primary float-right">Ändra</a><br>
            </td>
          </tr>
        @endforeach
    </table>
    </div>
    <div class="col-6">
      <h3>Betygsatta filmer:</h3>
      <table class="table">
        <tr>
          @foreach ($user->ratings as $rating)
          <a href="{{route('movies.show', ['id' => $rating->movie->id])}}">{{$rating->movie->title}}</a> Betyg: {{$rating->rating}}<br>
          @endforeach
        </tr>
      </table>
      </table>
    </div>
  </div>
</div>
@endsection
