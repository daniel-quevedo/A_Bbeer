@extends('layouts.layout')

@section('título','Inventario')

@section('content')
  <div class="mt-5 table-responsive">
    <table class="table table-sm table-striped" id="table-inventary">
      <thead class="table-light">
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          @if (Auth::user()->id_rol != 3 )
            <th>Acciones</th>
          @endif
        </tr>
      </thead>
      <tbody >
        @foreach ($inventaries as $item)
          <tr class="bgi-{{ $item->idInventario }} {{$item->estado == '0' ? 'bg-danger ' : '' }} bg-opacity-50">
            <td>{{ $item->producto }}</td>
            <td>{{ $item->cantidad }}</td>
            @if (Auth::user()->id_rol != 3)
              <td>
                <form action="{{ route('inventary.showEdit') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" readonly value="{{ $item->idInventario }}">
                  <div class="col-12 row">
                    <div class="col-6">
                      <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="form-check form-switch col-6">
                      <input class="form-check-input" type="checkbox" role="switch"
                      id="stateInv_{{ $item->idInventario }}" onclick="stateInventary({{ $item->idInventario }},
                      '{{ csrf_token() }}')" {{ ($item->estado == '1' ? 'checked' : '') }}>
                    </div>
                  </div>
                </form>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{ asset('js/inventary.js') }}"></script>
@endsection