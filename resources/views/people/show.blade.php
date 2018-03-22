@extends('layouts.app')
@section('content')

<div class="container">
<h1>Person: {{ $person->name }}</h1>
<p><a href="{{ route('people.edit', ['person' => $person->id]) }}" class="btn btn-primary">Ändra</a></p>

</div>
@endsection
