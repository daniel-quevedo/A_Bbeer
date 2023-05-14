@extends('layouts.layout')

@section('título','Tipo producto')

@section('content')
  <form action="{{ route('admin.typeProduct.add') }}" method="post">
    @csrf
    <div class="col-12 my-5">
      <label for="" class="form-label">Tipo de producto</label>
      <input type="text" class="form-control" name="tipo_producto" required placeholder="cerveza, vino, wisky, etc.">
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