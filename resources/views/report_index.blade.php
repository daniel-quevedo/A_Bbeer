@extends('layouts.layout')

@section('título','Reportes')

@section('content')
  <form action="{{ route('report.show') }}" method="post">
    @csrf
    <table class="table table-borderless">
      <thead>
        <tr>
          <th class="col-5">Productos</th>
          <th>Fecha inicio</th>
          <th>Fecha final</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <select name="id_producto" class="form-select">
              <option value="" selected disabled>Seleccione...</option>
              @foreach ($products as $item)
                <option value="{{ $item->idProducto }}">{{ $item->producto }}</option>
              @endforeach
            </select>
          </td>
          <td>
            <input type="datetime-local" name="fecha_ini" class="form-control" format="YYYY-MM-DDThh:mm:ss">
          </td>
          <td>
            <input type="datetime-local" name="fecha_fin" class="form-control">
          </td>
          <td>
            <button class="btn btn-primary">Buscar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
@endsection
@section('scripts')
  <script src="{{ asset('js/report.js') }}"></script>
@endsection