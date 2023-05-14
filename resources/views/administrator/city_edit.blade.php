@extends('layouts.layout')

@section('título','Ciudad')

@section('content')
  <form action="{{ route('admin.city.edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $cityEdit->idCiudad }}" readonly>
    <div class="col-12 my-5">
      <label for="" class="form-label">Nombre de la ciudad</label>
      <input type="text" class="form-control" name="ciudad" value="{{$cityEdit->ciudad}}" required>
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