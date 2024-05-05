@extends('layouts.layout')

@section('título','Usuarios')

@section('content')
  <form action="{{ route('admin.users.add') }}" method="post">
    @csrf
    <div class="col-12 row mt-5">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Primer nombre</label>
        <input type="text" class="form-control" name="primer_nom" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Segundo nombre</label>
        <input type="text" class="form-control" name="segundo_nom">
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" name="primer_ape" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" name="segundo_ape" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Cédula</label>
        <input type="number" class="form-control" name="cedula" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Correo</label>
        <input type="email" class="form-control" name="email" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha_nac" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Rol</label>
        <select name="id_rol" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($rol as $item)
            <option value="{{ $item->idRol }}">{{ $item->rol }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Género</label>
        <select name="id_genero" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($gender as $item)
              <option value="{{ $item->idGenero }}">{{ $item->genero }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">País</label>
        <select name="id_pais" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($country as $item)
              <option value="{{ $item->idPais }}">{{ $item->pais }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Ciudad</label>
        <select name="id_ciudad" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($city as $item)
              <option value="{{ $item->idCiudad }}">{{ $item->ciudad }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Sede</label>
        <select name="id_sede" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($headquarter as $item)
              <option value="{{ $item->idSede }}">{{ $item->sede }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="text-center">
      <button class="btn btn-success">Agregar</button>
    </div>
  </form>
@endsection
@section('scripts')
  <script src="{{ asset('js/user.js') }}"></script>
@endsection