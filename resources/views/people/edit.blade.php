@extends('layouts.app')
@section('content')

  <div class="container">
    <h1>Ändra en persons namn</h1>
    <form method="POST" action="{{ route('people.update', ['person' => $person->id]) }}">
      @csrf
      <div class="form-group">
        <label for="actor">Namn</label>
        <input type="text" class="form-control" id="person" name="person" value="{{ $person->name }}" placeholder="Ändra personens namn">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
