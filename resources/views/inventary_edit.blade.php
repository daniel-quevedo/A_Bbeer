@extends('layouts.layout')

@section('título','Inventario')

@section('content')
  <form action="{{ route('inventary.edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $inventaryEdit->idInventario }}" readonly>
    <div class="col-12 row mt-5">
      <div class="mb-3 col-6">
        <label for="" class="form-label">Producto</label>
        <input type="text" class="form-control" name="producto" value="{{ $inventaryEdit->producto }}" disabled>
      </div>
      <div class="mb-3 col-6">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" class="form-control" name="cantidad" value="{{ $inventaryEdit->cantidad }}" required>
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