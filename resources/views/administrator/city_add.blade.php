@extends('layouts.layout')

@section('título','Ciudad')

@section('content')
  <form action="{{ route('admin.city.add') }}" method="post">
    @csrf
    <div class="col-12 my-5">
      <label for="" class="form-label">Nombre de la ciudad</label>
      <input type="text" class="form-control" name="ciudad" required>
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