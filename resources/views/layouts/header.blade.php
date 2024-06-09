<div class="d-flex justify-content-between">
  <div class="menu">
    <a onclick="optSidebar()">
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
