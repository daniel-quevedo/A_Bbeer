@extends('layouts.layout')

@section('título','Sede')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.headquarter.store') }}" class="btn btn-outline-success">Agregar Sedes</a>
  </div>
  <div class="mt-5 table-responsive">
    <table class="table table-sm table-striped" id="table-headquarter">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($heardquarters as $item)
          <tr>
            <td id="hq-{{ $item->idSede }}">{{ $item->sede }}</td>
            <td>
              <form action="{{ route('admin.headquarter.delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->idSede }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <i class="fa-solid fa-pen-to-square btn btn-primary px-2"
                      onclick="showEditHeadQuarter({{ $item->idSede }},'{{ csrf_token() }}')"></i>
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
  <div class="modal fade" id="editHeadQuarter" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Sede</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idHeadQuarter" readonly>
          <div class="mb-3 col-12">
            <label class="form-label">Nombre de la sede</label>
            <input type="text" class="form-control" name="headQuarter" id="headQuarter">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal"
            onclick="editHeadQuarter('{{ csrf_token() }}')">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/headquarter.js') }}"></script>
@endsection