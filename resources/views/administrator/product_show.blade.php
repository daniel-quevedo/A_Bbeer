@extends('layouts.layout')

@section('título','Producto')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.product.store') }}" class="btn btn-outline-success">Agregar Producto</a>
  </div>
  <div class="mt-5 table-responsive">
    <div class="text-end m-2">
      <a href="{{ route('admin.product.download') }}" class="btn btn-sm btn-outline-secondary">Descargar plantilla</a>
      <label for="excel-file" class="btn btn-sm btn-outline-info">Subir plantilla</label>
      <input id="excel-file" onchange="importExcel()" type="file" class="d-none" accept=".xlsx, .xls">
    </div>
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
  <script src="{{ asset('js/product.js') }}"></script>
@endsection