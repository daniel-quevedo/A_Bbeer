@extends('layouts.layout')

@section('título','Mesa')

@section('content')
  <form action="{{ route('admin.mesa.add') }}" method="post">
    @csrf
    <div class="col-12 row mt-5">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Nombre de la mesa</label>
        <input type="text" class="form-control" name="mesa" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Sede</label>
        <select name="id_sede" class="form-control">
          <option value="" selected disabled>Seleccione..</option>
          @foreach ($headquarter as $item)
              <option value="{{ $item->idSede }}">{{ $item->sede }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Nombre del país</label>
        <select name="id_pais" class="form-control">
          <option value="" selected disabled>Seleccione..</option>
          @foreach ($country as $item)
              <option value="{{ $item->idPais }}">{{ $item->pais }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Nombre de la ciudad</label>
        <select name="id_ciudad" class="form-control">
          <option value="" selected disabled>Seleccione..</option>
          @foreach ($city as $item)
              <option value="{{ $item->idCiudad }}">{{ $item->ciudad }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div>
      <button class="btn btn-success">Agregar</button>
    </div>
  </form>
@endsection
@section('scripts')
  <script src="{{ asset('js/mesa.js') }}"></script>
@endsection