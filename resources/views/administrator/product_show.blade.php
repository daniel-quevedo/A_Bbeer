@extends('layouts.layout')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.product.store') }}" class="btn btn-outline-success">Agregar Producto</a>
  </div>
  <div class="mt-5">
    <table class="table table-sm table-striped" id="table-product">
      <thead class="table-light">
        <tr>
          <th>Código producto</th>
          <th>Nombre</th>
          <th>Costo de venta</th>
          <th>Costo de compra</th>
          <th>Tipo de producto</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($products as $item)
          <tr>
            <td>{{ $item->cod_producto }}</td>
            <td>{{ $item->producto }}</td>
            <td>{{ $item->costo_venta_producto }}</td>
            <td>{{ $item->costo_producto }}</td>
            <td>{{ $item->tipo_producto }}</td>
            <td>
              <form action="{{ route('admin.product.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->idProducto }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                  </div>
                  <div class="col-6">
                    <button formaction="{{ route('admin.product.delete') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
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
@section('scripts')
  <script>
    $(document).ready(function () {
      $('#table-product').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 3, 5, 10, 50, 100 ],
        pageLength: 3,
      });
    });
  </script>
@endsection