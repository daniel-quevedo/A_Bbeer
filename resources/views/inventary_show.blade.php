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
          <tr>
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
  <script>
    $(document).ready(function () {
      $('#table-inventary').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 5, 10, 50, 100 ],
        pageLength: 5,
      });
    });
  </script>
@endsection