<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
  <title>@yield('título','Inicio')</title>
</head>
<body>
  <header>
    <div class="d-flex justify-content-between">
      <div class="menu">
        <a href="javascript:void(0)" onclick="optSidebar()">
          <i class="fa-solid fa-bars"></i>
        </a>
        <span>A Bbeer</span>
      </div>
      <div class="dropdown mt-1">
        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                <span>Salir</span>
              </a>
            </form>
          </li>
        </ul>
      </div>
    </div>

  </header>
  <section>
    <nav class="sidebar" id="sidebar">
      <div class="info" id="info">
        <img src="{{ asset('img/avatar.png') }}" class="img_info" id="img_info">
        <div class="text_info" id="text_info">
          <h5> {{ Auth::user()->name }}</h5>
        </div>
      </div>
      <ul>
        <li class="selected">
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-house"></i>
            <span class="txt_links">Inicio</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-list"></i>
            <span class="txt_links">Parametrización</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-folder-open"></i>
            <span class="txt_links">Reportes</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-screwdriver-wrench"></i>
            <span class="txt_links">Configuración</span>
          </a>
        </li>
      </ul>
    </nav>
    <main id="main">
      @yield('content')
    </main>
  </section>
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
@yield('scripts')
</html>