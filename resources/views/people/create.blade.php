@extends('layouts.app')
@section('content')

<div class="container">
  <h1>Lägg till person</h1>
  <form method="POST" action="{{ route('people.store') }}">
    @csrf
    <div class="form-group">
      <label for="person">Namn på personen</label>
      <input type="text" class="form-control" id="person" name="person" placeholder="Lägg till person">

    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
