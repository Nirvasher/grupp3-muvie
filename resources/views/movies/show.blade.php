@extends('layouts.app')

@section('content')
<div class="container">
<h3>Titel</h3>{{$movie->title}}<br>
<h3>Beskrivning</h3>{{$movie->description}}<br>
<h3>Speltid</h3>{{$movie->runtime}}<br>
<h3>Släppt Datum</h3>{{$movie->releasedate}}<br>
<h3>Media ID</h3>{{$movie->media_id}}<br>
</div>
@endsection
