@extends('layouts.layout')

@section('content')
  <form action="{{ route('admin.users.edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" readonly value="{{ $userEdit->id }}">
    <div class="col-12 row mt-5">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Primer nombre</label>
        <input type="text" class="form-control" name="primer_nom" value="{{ $userEdit->primer_nom }}" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Segundo nombre</label>
        <input type="text" class="form-control" name="segundo_nom" value="{{ $userEdit->segundo_nom }}" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" name="primer_ape" value="{{ $userEdit->primer_ape }}" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" name="segundo_ape" value="{{ $userEdit->segundo_ape }}" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Cédula</label>
        <input type="number" class="form-control" name="cedula" value="{{ $userEdit->cedula }}" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Correo</label>
        <input type="email" class="form-control" name="email" value="{{ $userEdit->email }}" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha_nac" value="{{ $userEdit->fecha_nac }}" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Rol</label>
        <select name="id_rol" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($rol as $item)
            <option value="{{ $item->idRol }}" {{ ($userEdit->id_rol == $item->idRol) ? 'selected' : '' }} >{{ $item->rol }}</option>
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
              <option value="{{ $item->idGenero }}" {{ ($userEdit->id_genero == $item->idGenero) ? 'selected' : '' }} >{{ $item->genero }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">País</label>
        <select name="id_pais" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($country as $item)
              <option value="{{ $item->idPais }}" {{ ($userEdit->id_pais == $item->idPais) ? 'selected' : '' }} >{{ $item->pais }}</option>
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
              <option value="{{ $item->idCiudad }}" {{ ($userEdit->id_ciudad == $item->idCiudad) ? 'selected' : '' }} >{{ $item->ciudad }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Sede</label>
        <select name="id_sede" class="form-control" required>
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($sede as $item)
              <option value="{{ $item->idSede }}" {{ ($userEdit->id_sede == $item->idSede) ? 'selected' : '' }} >{{ $item->sede }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="text-center">
      <button class="btn btn-success">Editar</button>
    </div>
  </form>
@endsection
@section('scripts')
  <script>
  </script>
@endsection