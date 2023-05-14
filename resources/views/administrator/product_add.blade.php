@extends('layouts.layout')

@section('título','Producto')

@section('content')
  <form action="{{ route('admin.product.add') }}" method="post">
    @csrf
    <div class="col-12 row mt-5">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Códido producto</label>
        <input type="text" class="form-control" name="cod_producto" required>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="producto" required>
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Costo de compra del producto</label>
        <input type="number" class="form-control" name="costo_producto" required placeholder="A que costo compraste el producto">
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Costo de venta del producto</label>
        <input type="number" class="form-control" name="costo_venta_producto" required placeholder="A que costo venderas el producto">
      </div>
    </div>
    <div class="col-12 row">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Tipo de producto</label>
        <select name="id_tipoProducto" class="form-control">
          <option value="" selected disabled>Seleccione...</option>
          @foreach ($typeProduct as $item)
              <option value="{{ $item->idTipoProducto }}">{{ $item->tipo_producto }}</option>
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
  <script>
  </script>
@endsection