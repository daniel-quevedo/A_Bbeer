<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/datatable/bootstrap5.2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/datatable/datatables.bootstrap5.2.min.css') }}">
  @yield('links')
  <title>@yield('título','Inicio')</title>
</head>
<body>
  <header>
    @include('layouts.header')
  </header>
  <section>
    @include('layouts.sidebar')
  </section>
  <main id="main">
    @yield('content')
  </main>
  <section>
    @yield('modals')
  </section>
  @include('sweetalert::alert')
</body>
<script src="{{ asset('js/jquery/jquery3.5.1.js') }}"></script>
<script src="{{ asset('bootstrap/js/datatables/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/datatables/datatables.bootstrap5.2.min.js') }}"></script>

@if (Auth::user()->remember_token == null)
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'warning',
    title: 'Cambia tu clave por defecto',
    showConfirmButton: false,
  })
</script>
@endif
<script src="{{ asset('js/javascript.js') }}"></script>
@yield('scripts')
</html>