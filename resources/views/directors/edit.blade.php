@extends('layouts.app')
@section('content')

  <div class="container">

    <form method="POST" action="{{ route('directors.update', ['director' => $director->id]) }}">
      @csrf
      <div class="form-group">
        <label for="actor">Regissören</label>
        <input type="text" class="form-control" id="director" name="name" value="{{ $director->name }}" placeholder="Redigera regissörens namn">

      </div>

      <button type="submit" class="btn btn-primary">Spara</button>
    </form>

</div>

@endsection
