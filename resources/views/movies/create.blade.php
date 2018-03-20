@extends('layouts.app')
@section('content')

<div class="container">
  <form method="POST" action="{{ route('movies.store') }}">
    @csrf
    <div class="form-group">
      <label for="movie">Film namn</label>
      <input type="text" class="form-control" id="movie" name="movie" placeholder="Lägg till film">

    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
