@extends('layouts.layout')

@section('título','Tipo producto')

@section('content')
  <form action="{{ route('admin.typeProduct.edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $typeProductEdit->idTipoProducto }}" readonly>
    <div class="col-12 my-5">
      <label for="" class="form-label">Tipo de producto</label>
      <input type="text" class="form-control" name="tipo_producto" required value="{{ $typeProductEdit->tipo_producto }}">
    </div>
    <div>
      <button class="btn btn-success">Actualizar</button>
    </div>
  </form>
@endsection
@section('scripts')
  <script>
  </script>
@endsection