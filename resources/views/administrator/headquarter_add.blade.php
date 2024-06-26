@extends('layouts.layout')

@section('título','Sede')

@section('content')
  <form action="{{ route('admin.headquarter.add') }}" method="post">
    @csrf
    <div class="col-12 my-5">
      <label for="" class="form-label">Nombre de la sede</label>
      <input type="text" class="form-control" name="sede" required>
    </div>
    <div>
      <button class="btn btn-success">Agregar</button>
    </div>
  </form>
@endsection
@section('scripts')
  <script src="{{ asset('js/headquarter.js') }}"></script>
@endsection