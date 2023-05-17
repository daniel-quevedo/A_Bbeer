@extends('layouts.layout')

@section('título','Pedido')

@section('content')
  <table class="table table-responsive table-sm mt-5">
    <thead class="table-dark">
      <tr>
        <td>Producto</td>
        <td>Cantidad</td>
        <td>Valor</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($showOrder as $item)
        <tr>
          <td>{{ $item->producto }}</td>
          <td>{{ $item->cantidad }}</td>
          <td>${{ $item->total }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
@section('scripts')
  <script>
  </script>
@endsection