@extends('layouts.layout')

@section('título','Reportes')

@section('content')
  @if ($reports->count() == 0)
    <div class="mt-5 no-sold">
      <h2 class="text-center">No se vendió nada de este producto</h2>
      <h2 class="text-center"><i class="fa-solid fa-face-sad-tear fa-2xl"></i></h2>
    </div>
  @else
    <div class="table-responsive">
      <div>
        <h3>{{ $reports[0]->producto }}</h3>
      </div>
      <table class="table mt-4">
        <thead class="table-dark">
          <tr>
            <td>Mesa</td>
            <td>Cantidad</td>
            <td>Valor total</td>
            <td>Pagado</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($reports as $item)
              <tr>
                <td>{{ $item->mesa }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>${{ $item->total }}</td>
                <td>{{ ($item->pagado == 1 ? 'SI' : 'NO') }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
@section('scripts')
  <script>

  </script>
@endsection