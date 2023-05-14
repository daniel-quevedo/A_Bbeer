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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  @yield('links')
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
  </header>
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
          <a href="{{ route('dashboard') }}">
            <i class="icon-sidebar fa-lg fa-solid fa-house"></i>
            <span class="txt_links">Inicio</span>
          </a>
        </div>
        @if (Auth::user()->id_rol == 1)
          <div class="item-menu">
            <a>
              <i class="icon-sidebar fa-lg fa-solid fa-list"></i>
              <span class="txt_links">Parametrización</span>
              <i class="fa-solid fa-angle-right ico-submenu" id="ico-submenu"></i>
            </a>
            <div class="submenu">
              <a href="{{ route('admin.city.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-city"></i>
                <span>Ciudad</span>
              </a>
              <a href="{{ route('admin.country.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-earth-americas"></i>
                <span>País</span>
              </a>
              <a href="{{ route('admin.users.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-users"></i>
                <span>Usuarios</span>
              </a>
              <a href="{{ route('admin.mesa.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-clipboard"></i>
                <span>Mesa</span>
              </a>
              <a href="{{ route('admin.headquarter.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-building-flag"></i>
                <span>Sede</span>
              </a>
              <a href="{{ route('admin.typeProduct.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-barcode"></i>
                <span>Tipo de Productos</span>
              </a>
              <a href="{{ route('admin.product.index') }}" class="sub-item">
                <i class="icon-sidebar fa-solid fa-cart-shopping"></i>
                <span>Productos</span>
              </a>
            </div>
          </div>
        @endif
        @if (Auth::user()->id_rol == 2 || Auth::user()->id_rol == 1)
          <div class="item-menu">
            <a href="{{ route('inventary.index') }}">
              <i class="icon-sidebar fa-solid fa-truck-ramp-box"></i>
              <span class="txt_links">Inventario</span>
            </a>
          </div>
        @endif
        <div class="item-menu">
          <a href="">
            <i class="icon-sidebar fa-lg fa-solid fa-folder-open"></i>
            <span class="txt_links">Reportes</span>
          </a>
        </div>
        <div class="item-menu">
          <a href="{{ route('profile.edit') }}">
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
  @include('sweetalert::alert')
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@yield('scripts')
</html>