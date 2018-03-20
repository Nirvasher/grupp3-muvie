@extends('layouts.app')
@section('content')

<div class="container">
  <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Filmtitel</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Lägg till titel">
    </div>
    <div class="form-group">
      <label for="description">Beskrivning</label>
      <textarea name="description" id="description" rows="8" cols="80" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="runtime">Spellängd</label>
      <input type="text" class="form-control" id="runtime" name="runtime" placeholder="Lägg till spellängd">
    </div>
    <div class="form-group">
      <label for="releasedate">Släppdatum</label>
      <input type="date" class="form-control" id="releasedate" name="releasedate">
    </div>
    <div class="form-group">
      <label for="director">Regissör</label>
      <select class="form-control" name="director" id="director">
        @foreach ($people as $person)
        <option value="{{ $person->id }}">{{ $person->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="poster">Posterbild</label>
      <input type="file" class="form-control" id="poster" name="poster">
    </div>

    <button type="submit" class="btn btn-primary">Lägg till</button>
  </form>

</div>

@endsection
