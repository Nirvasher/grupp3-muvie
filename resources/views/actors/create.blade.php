@extends('layouts.app')
@section('content')

<div class="container">
  <form method="POST" action="{{ route('actors.store') }}">
    @csrf
    <div class="form-group">
      <label for="actor">Skådespelarenamn</label>
      <input type="text" class="form-control" id="actor" name="actor" placeholder="Lägg till skådespelare">

    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
