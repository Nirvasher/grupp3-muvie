<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Hem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('genres.index') }}">Genrer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('movies.index') }}">Filmer</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.show', ['user' => Auth::user()->id])}}">Min profil</a>
          </li>
            @if (Auth::user()->hasRole('editor'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administrera
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Lägg till film</a>
              <a class="dropdown-item" href="{{ route('genres.create') }}">Lägg till genre</a>
              <a class="dropdown-item" href="{{ route('movies.create') }}">Lägg till film</a>
              <a class="dropdown-item" href="{{ route('actors.create') }}">Lägg till skådespelare</a>
              <a class="dropdown-item" href="{{ route('directors.create') }}">Lägg till regissör</a>
            </div>
          </li>
          @endif
        @endauth
        </ul>
        <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Logga in</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrera dig</a></li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logga ut</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
          </li>
        @endguest
        </ul>
      </div>
    </div>
  </nav>

  @if(Session::has('flash_message'))
    <div class="container">
      <div class="alert alert-info">
        {{ Session::get('flash_message') }}
      </div>
    </div>
  @endif

  @yield('content')

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
