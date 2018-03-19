@extends('layouts.app')
@section('content')

  <div class="container">

    <form method="POST" action="{{ route('genres.update', ['genre' => $genre->id]) }}">
      @csrf
      <div class="form-group">
        <label for="genre">Genrenamn</label>
        <input type="text" class="form-control" id="genre" name="name" value="{{ $genre->name }}" placeholder="Redigera genre">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
