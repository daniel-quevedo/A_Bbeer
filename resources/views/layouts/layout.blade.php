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
  <div class="header">
    <div class="d-flex justify-content-between">
      <div class="menu">
        <a href="javascript:void(0)" onclick="optSidebar()">
          <i class="fa-solid fa-bars"></i>
        </a>
        <span>A Bbeer</span>
      </div>
      <div class="dropdown mt-1">
        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->primer_nom }} {{ Auth::user()->primer_ape }}
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
  </div>
  <section>
    <div class="sidebar" id="sidebar">
      <div class="info" id="info">
        <img src="{{ asset('img/avatar.png') }}" class="img_info" id="img_info">
        <div class="text_info" id="text_info">
          <h5> {{ Auth::user()->primer_nom }} {{ Auth::user()->primer_ape }}</h5>
        </div>
      </div>
      <div class="menu">
        <div class="item-menu">
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-house"></i>
            <span class="txt_links">Inicio</span>
          </a>
        </div>
        <div class="item-menu">
          <a>
            <i class="icon-sidebar fa-lg fa-solid fa-list"></i>
            <span class="txt_links">Parametrización</span>
            <i class="fa-solid fa-angle-right ico-submenu" id="ico-submenu"></i>
          </a>
          <div class="submenu">
            <a href="" class="sub-item">
              <i class="icon-sidebar fa-solid fa-users"></i>
              <span class="txt_links">Usuarios</span>
            </a>
            <a href="" class="sub-item">
              <i class="icon-sidebar fa-solid fa-city"></i>
              <span class="txt_links">Ciudad</span>
            </a>
            <a href="" class="sub-item">
              <i class="icon-sidebar fa-solid fa-earth-americas"></i>
              <span class="txt_links">Pais</span>
            </a>
            <a href="" class="sub-item">
              <i class="icon-sidebar fa-solid fa-clipboard"></i>
              <span class="txt_links">Mesa</span>
            </a>
            <a href="" class="sub-item">
              <i class="icon-sidebar fa-solid fa-dolly"></i>
              <span class="txt_links">Productos</span>
            </a>
          </div>
        </div>
        <div class="item-menu">
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-folder-open"></i>
            <span class="txt_links">Reportes</span>
          </a>
        </div>
        <div class="item-menu">
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-screwdriver-wrench"></i>
            <span class="txt_links">Configuración</span>
          </a>
        </div>
      </div>
    </div>
    <main id="main">
      @yield('content')
    </main>
  </section>
  <script>
    const submenu = document.querySelector('.submenu');
    const parentMenu = document.querySelector('.sidebar .item-menu:nth-child(2)');

    parentMenu.addEventListener('click', function() {
      submenu.classList.toggle('hide');
      document.querySelector('.ico-submenu').classList.toggle('rotate');
    });
  </script>
  <script src="{{ asset('js/javascript.js') }}"></script>
</body>
@yield('scripts')
</html>