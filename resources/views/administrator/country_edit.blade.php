@extends('layouts.layout')

@section('título','País')

@section('content')
  <form action="{{ route('admin.country.edit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $countryEdit->idPais }}" readonly>
    <div class="col-12 my-5">
      <label for="" class="form-label">Nombre del país</label>
      <input type="text" class="form-control" name="pais" value="{{$countryEdit->pais}}" required>
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