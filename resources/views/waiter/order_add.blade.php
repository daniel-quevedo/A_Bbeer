@extends('layouts.layout')

@section('título','Pedido')

@section('content')
  <form action="{{ route('waiter.order.add') }}" method="post">
    @csrf
    <input type="hidden" name="cod_pedido" id="cod_order" readonly>
    <table class="table table-borderless table-responsive">
      <tr>
        <td>Productos</td>
        <td>Mesa</td>
        <td>Cantidad</td>
        <td>Valor Unidad</td>
      </tr>
      <tr>
        <td class="col-4">
          <select name="id_producto" class="form-select" id="product" required>
            <option value="" selected disabled>Seleccione...</option>
            @foreach ($products as $item)
              <option value="{{ $item->idProducto }}">{{ $item->producto }}</option>
            @endforeach
          </select>
        </td>
        <td class="col-4">
          <select name="id_mesa" class="form-select" id="mesa" required>
            <option value="" selected disabled>Seleccione...</option>
            @foreach ($mesa as $item)
              <option value="{{ $item->idMesa }}">{{ $item->mesa }}</option>
            @endforeach
          </select>
        </td>
        <td class="col-2">
          <input type="number" name="cantidad" class="form-control" required>
        </td>
        <td class="col-2">
          <select class="form-control" id="valueU" disabled>
            <option value="" selected disabled></option>
            @foreach ($products as $item)
              <option value="{{ $item->idProducto }}" >{{ $item->costo_venta_producto }}</option>
            @endforeach
          </select>
        </td>
        <td class="col-1">
          <button class="btn btn-success btn-sm" id="send"><i class="fa-solid fa-circle-plus"></i></button>
        </td>
      </tr>
    </table>
    <hr>
    @if ($order != null)
      <table class="table table-responsive table-sm mt-5">
        <thead class="table-dark">
          <tr>
            <td>Producto</td>
            <td>Cantidad</td>
            <td>Valor</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($order as $item)
            <tr>
              <td>{{ $item->producto }}</td>
              <td>{{ $item->cantidad }}</td>
              <td>${{ $item->total }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </form>
@endsection
@section('scripts')
  <script>
    let m = document.getElementById('mesa');
    let mesa;
    let p = document.getElementById('product');
    let valueU = document.getElementById('valueU');
    let val;
    let cod_order;
    p.addEventListener('change', function(){
      val = p.value
      valueU.value = val;
    });

    m.addEventListener('change', function(){
      mesa = 'M0' + m.value;
    });

    document.getElementById('send').addEventListener('click',function() {
      cod_order = '1_cod_'+mesa;
      document.getElementById('cod_order').value = cod_order;
    })

  </script>
@endsection