@extends('layouts.layout')

@section('título', 'Inventario')

@section('content')
  <div class="table-responsive">
    <table class="table table-sm table-striped" id="table-inventary">
      <thead class="table-light">
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          @if (Auth::user()->id_rol != 3)
            <th>Acciones</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($inventaries as $item)
          <tr class="bgi-{{ $item->idInventario }} {{ $item->estado == '0' ? 'bg-danger ' : '' }} bg-opacity-50">
            <td>{{ $item->producto }}</td>
            <td id="cant-{{ $item->idInventario }}">{{ $item->cantidad }}</td>
            @if (Auth::user()->id_rol != 3)
              <td>
                <div class="col-12 row">
                  <div class="col-6">
                    <i class="fa-solid fa-pen-to-square btn btn-primary"
                      onclick="showEditInv('{{ $item->idInventario }}','{{ csrf_token() }}')"></i>
                  </div>
                  <div class="form-check form-switch col-6">
                    <input class="form-check-input" type="checkbox" role="switch" id="stateInv_{{ $item->idInventario }}"
                      onclick="stateInventary({{ $item->idInventario }},
                    '{{ csrf_token() }}')"
                      {{ $item->estado == '1' ? 'checked' : '' }}>
                  </div>
                </div>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('modals')
  <div class="modal fade" id="editInv" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar cantidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idInv" readonly>
          <div class="mb-3 col-12">
            <label class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto" id="prodInv" disabled>
          </div>
          <div class="mb-3 col-12">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantInv" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal"
            onclick="editInv('{{ csrf_token() }}')">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/inventary.js') }}"></script>
@endsection
