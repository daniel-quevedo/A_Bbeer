@extends('layouts.layout')

@section('título','País')

@section('content')
  <form action="{{ route('admin.country.add') }}" method="post">
    @csrf
    <div class="col-12 my-5">
      <label for="" class="form-label">Nombre del país</label>
      <input type="text" class="form-control" name="pais" required>
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