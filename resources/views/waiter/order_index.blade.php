@extends('layouts.layout')

@section('título','Pedido')

@section('content')
  <div class="col-12">
    <a href="{{ route('waiter.order.store') }}" class="btn btn-outline-success">Realizar pedido</a>
  </div>
  <div class="mt-5 table-responsive">
    <table class="table table-sm table-striped" id="table-order">
      <thead class="table-light">
        <tr>
          <th>Pedido</th>
          <th>Mesa</th>
          <th>Total bebidas</th>
          <th>Pagado</th>
          <th>Valor total</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($orders as $item)
          <tr id="row-{{ $item->cod_pedido }}" class="text-dark bg-opacity-50 {{ ($item->pagado == 1 ? 'bg-success' : 'bg-danger') }}">
            <td>{{ $item->cod_pedido }}</td>
            <td>{{ $item->mesa }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>{{ ($item->pagado == 1 ? 'SI' : 'NO') }}</td>
            <td>${{ $item->total }}</td>
            <td>
              <form action="{{ route('waiter.order.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="cod_pedido" readonly value="{{ $item->cod_pedido }}">
                <div class="col-12 row">
                  @if ($item->pagado != 1)
                    <div class="col-4">
                      <button class="btn btn-sm btn-primary" title="Editar" ><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    <div class="col-4">
                      <button formaction="{{ route('waiter.order.edit') }}" class="btn btn-sm btn-success" title="Pagar"><i class="fa-solid fa-coins"></i></button>
                    </div>
                    <div class="col-4">
                      <i class="fa-solid fa-trash btn btn-danger" title="Eliminar" onclick="delOrder('{{ $item->cod_pedido }}','{{ csrf_token() }}')"></i>
                    </div>
                  @else
                    <div class="col-4">
                      <button formaction="{{ route('waiter.order.show') }}" class="btn btn-sm btn-dark" title="Ver"><i class="fa-solid fa-eye"></i></button>
                    </div>
                  @endif
                </div>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/order.js') }}"></script>
@endsection