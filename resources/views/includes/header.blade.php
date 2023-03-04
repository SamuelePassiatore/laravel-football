<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Serie A" width="30" class="img-fluid d-inline-block me-3">
        {{ env('APP_NAME') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link @if (Route::is('home')) active @endif" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('teams*')) active @endif"
              href="{{ route('teams.index') }}">Teams</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
