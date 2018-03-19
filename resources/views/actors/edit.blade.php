@extends('layouts.app')
@section('content')

  <div class="container">

    <form method="POST" action="{{ route('actors.update', ['actor' => $actor->id]) }}">
      @csrf
      <div class="form-group">
        <label for="actor">Skådespelarenamn</label>
        <input type="text" class="form-control" id="actor" name="name" value="{{ $actor->name }}" placeholder="Redigera skådespelarenamn">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
