@foreach ($movies as $movie)
<a href="{{route('movies.show', ['id' => $movie->id])}}">{{$movie->title}}</a><br>
@endforeach
