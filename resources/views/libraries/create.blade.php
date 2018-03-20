@extends('layouts.app')
@section('content')

<div class="container">
  <h1>Lägg till filmen {{ $movie->title }} i ditt bibliotek</h1>
  <form method="POST" action="{{ route('libraries.store', ['movie' => $movie->id]) }}">
    @csrf
    <div class="form-group">
      <label for="format">Format</label>
      <input type="text" class="form-control" id="format" name="format" placeholder="Välj vilket format">
    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
