@extends('layouts.app')
@section('content')

  <div class="container">

    <form method="POST" action="{{ route('movies.update', ['movie' => $movie->id]) }}">
      @csrf
      <div class="form-group">
        <label for="movie">Film namn</label>
        <input type="text" class="form-control" id="movie" name="name" value="{{ $movie->name }}" placeholder="Redigera film">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
