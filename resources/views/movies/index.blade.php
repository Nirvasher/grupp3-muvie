@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="card-deck">
      @foreach ($movies as $movie)
        <div class="card mb-4" style="flex-basis: 200px; flex-grow: 0;">
          @isset($movie->image)
          <img class="card-img-top" src="{{ asset('storage/'.$movie->image->url) }}" alt="Card image cap">
          @endisset
          <div class="card-body">
            <h5 class="card-title"> {{ $movie->title }} </h5>
            <p class="card-text"> {{ $movie->description }}</p>
          </div><!-- /card-body -->
          <div class="card-footer">
            <a href="{{route('movies.show', ['id' => $movie->id])}}" class="btn btn-success btn-block">Läs mer</a><br>
          </div><!-- /card-footer -->
        </div><!-- /card -->
      @endforeach
    </div><!-- /card-deck -->
  </div><!-- /container-->
@endsection
