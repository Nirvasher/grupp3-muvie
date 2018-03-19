@extends('layouts.app')
@section('content')

<div class="container">
  <form method="POST" action="{{ route('directors.store') }}">
    @csrf
    <div class="form-group">
      <label for="director">Regissören</label>
      <input type="text" class="form-control" id="director" name="director" placeholder="Lägg till regissör">
    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
