<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-main">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">TopUp-IN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <div class="d-flex">
        @auth
          <a class="btn btn-dark text-light px-5" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        @else
          <a href="/login" class="btn btn-purple px-5">Login</a>
        @endauth
      </div>
    </div>
  </div>
</nav>