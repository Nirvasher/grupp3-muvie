@extends('layouts.app')
@section('content')

<div class="container">
  Lägg till bild för filmen {{$movie->title}}
  <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
    <div class="form-group">
      <label for="image">Bild:</label>
      <input type="file" class="form-control" id="image" name="image" placeholder="Lägg till bild">
    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
