@extends('layouts.app')
@section('content')

  <div class="container">
    Ändra format för filmen: {{ $library->movie->title }}
    <form method="POST" action="{{ route('libraries.update', ['library' => $library->id]) }}">
      @csrf
      <div class="form-group">
        <label for="format">Format</label>
        <input type="text" class="form-control" id="format" name="format" value="{{ $library->format }}" placeholder="Ändra valt format">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
