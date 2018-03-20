@extends('layouts.app')
@section('content')

  <div class="container">
    Ändra format för filmen: {{ $library->movie->title }}
    <form method="POST" action="{{ route('libraries.update', ['library' => $library->id]) }}">
      @csrf
      <div class="form-group">
        <label for="format">Format</label>
        <select class="form-control" name="format" id="format">
          <option value="Blu-ray"{{ $library->format === "Blu-ray" ? " selected" : "" }}>Blu-ray</option>
          <option value="DVD"{{ $library->format === "DVD" ? " selected" : "" }}>DVD</option>
          <option value="VHS"{{ $library->format === "VHS" ? " selected" : "" }}>VHS</option>
        </select>

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
