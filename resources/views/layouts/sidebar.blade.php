<div class="sidebar" id="sidebar">
  <div class="info">
    @if (Auth::user()->foto_perfil != null)
      <img src="{{ asset('photos/' . Auth::user()->foto_perfil) }}" class="img_info">
    @else
      <img src="{{ asset('img/avatar.png') }}" class="img_info">
    @endif
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
          <span class="txt_links_sub">Parametrización</span>
          <i class="fa-solid fa-angle-down ico-submenu"></i>
        </a>
        <div class="submenu">
          <a href="{{ route('admin.country.index') }}">
            <i class="icon-sidebar fa-solid fa-earth-americas"></i>
            <span>País</span>
          </a>
          <a href="{{ route('admin.city.index') }}">
            <i class="icon-sidebar fa-solid fa-city"></i>
            <span>Ciudad</span>
          </a>
          <a href="{{ route('admin.users.index') }}">
            <i class="icon-sidebar fa-solid fa-users"></i>
            <span>Usuarios</span>
          </a>
          <a href="{{ route('admin.mesa.index') }}">
            <i class="icon-sidebar fa-solid fa-clipboard"></i>
            <span>Mesa</span>
          </a>
          <a href="{{ route('admin.headquarter.index') }}">
            <i class="icon-sidebar fa-solid fa-building-flag"></i>
            <span>Sede</span>
          </a>
          <a href="{{ route('admin.typeProduct.index') }}">
            <i class="icon-sidebar fa-solid fa-barcode"></i>
            <span>Tipo de Productos</span>
          </a>
          <a href="{{ route('admin.product.index') }}">
            <i class="icon-sidebar fa-solid fa-cart-shopping"></i>
            <span>Productos</span>
          </a>
        </div>
      </div>
    @endif
    <div class="item-menu">
      <a href="{{ route('inventary.index') }}">
        <i class="icon-sidebar fa-solid fa-truck-ramp-box"></i>
        <span class="txt_links">Inventario</span>
      </a>
    </div>
    @if (Auth::user()->id_rol == 2 || Auth::user()->id_rol == 1)
      <div class="item-menu">
        <a href="{{ route('report.index') }}">
          <i class="icon-sidebar fa-lg fa-solid fa-folder-open"></i>
          <span class="txt_links">Reportes</span>
        </a>
      </div>
    @endif
    @if (Auth::user()->id_rol == 3)
      <div class="item-menu">
        <a href="{{ route('waiter.order.index') }}">
          <i class="icon-sidebar fa-lg fa-solid fa-file-signature"></i>
          <span class="txt_links">Pedidos</span>
        </a>
      </div>
    @endif
    <div class="item-menu">
      <a href="{{ route('profile.edit') }}">
        <i class="icon-sidebar fa-lg fa-solid fa-screwdriver-wrench"></i>
        <span class="txt_links">Configuración</span>
      </a>
    </div>
  </div>
</div>
