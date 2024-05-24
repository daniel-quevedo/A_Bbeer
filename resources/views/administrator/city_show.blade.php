@extends('layouts.layout')

@section('título','Ciudad')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.city.store') }}" class="btn btn-outline-success">Agregar Ciudades</a>
  </div>
  <div class="mt-5 table-responsive">
    <table class="table table-sm table-striped" id="table-city">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($cities as $item)
          <tr>
            <td id="city-{{ $item->idCiudad }}">{{ $item->ciudad }}</td>
            <td>
              <form action="{{ route('admin.city.delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->idCiudad }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <i class="fa-solid fa-pen-to-square btn btn-primary px-2"
                    onclick="showEditCity({{ $item->idCiudad }},'{{ csrf_token() }}')"></i>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </div>
                </div>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('modals')
  <div class="modal fade" id="editCity" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Ciudad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idCity" readonly>
          <div class="mb-3 col-12">
            <label class="form-label">Nombre del ciudad</label>
            <input type="text" class="form-control" name="city" id="city">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal"
            onclick="editCity('{{ csrf_token() }}')">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/city.js') }}"></script>
@endsection