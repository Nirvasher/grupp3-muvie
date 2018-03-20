@extends('layouts.app')
@section('content')

<div class="container">
  <h1>Lägg till skådespelare för filmen {{ $movie->title }}</h1>
  <form method="POST" action="{{ route('actors.store') }}">
    @csrf
    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
    <div class="form-group">
      <label for="actor">Skådespelarenamn</label>
      <select class="form-control" name="actor">
      @foreach ($people as $person)
      <option value="{{$person->id}}">{{$person->name}}</option>
      @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
