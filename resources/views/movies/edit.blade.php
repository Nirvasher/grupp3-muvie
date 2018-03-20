@extends('layouts.app')
@section('content')

  <div class="container">

    <form method="POST" action="{{ route('movies.update', ['movie' => $movie->id]) }}">
      @csrf
      <div class="form-group">
        <label for="title">Filmtitel</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" placeholder="Ändra filmtiteln">
      </div>
      <div class="form-group">
        <label for="description">Beskrivning</label>
        <textarea name="description" id="description" rows="8" cols="80" class="form-control">{{ $movie->description }}</textarea>
      </div>
      <div class="form-group">
        <label for="runtime">Spellängd</label>
        <input type="text" class="form-control" id="runtime" name="runtime" placeholder="Ändra spellängd" value="{{ $movie->runtime }}">
      </div>
      <div class="form-group">
        <label for="releasedate">Släppdatum</label>
        <input type="date" class="form-control" id="releasedate" name="releasedate" value="{{ $movie->releasedate }}">
      </div>
      <div class="form-group">
        <label for="director">Regissör</label>
        <select class="form-control" name="director" id="director">
          @empty($movie->director)
          @foreach ($people as $person)
          <option value="{{ $person->id }}">{{ $person->name }}</option>
          @endforeach
          @else
          @foreach ($people as $person)
          <option value="{{ $person->id }}"{{ $movie->director->person->name === $person->name ? " selected" : "" }}>{{ $person->name }}</option>
          @endforeach
          @endempty
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
