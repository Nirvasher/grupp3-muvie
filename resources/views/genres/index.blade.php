<h1>Genrer:</h1>

<ul>
  @foreach($genres as $genre)
    <li><a href="{{ ('genres.show', ['genre' => $genre->id]) }}">{{ $genre->name }}</a></li>
  @endforeach 
</ul>
