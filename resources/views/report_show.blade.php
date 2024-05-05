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
      <table class="table mt-4 table-sm" id="table-report">
        <thead class="table-dark">
          <tr>
            @if (Auth::id() == 1)
              <th>Ciudad</th>
              <th>Sede</th>
            @endif
            <th>Mesa</th>
            <th>Cantidad</th>
            <th>Valor total</th>
            <th>Pagado</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reports as $item)
              <tr>
                @if (Auth::id() == 1)
                  <td>{{ $item->ciudad }}</td>
                  <td>{{ $item->sede }}</td>
                @endif
                <td>{{ $item->mesa }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>${{ $item->total }}</td>
                <td>{{ ($item->pagado == 1 ? 'SI' : 'NO') }}</td>
                <td>{{ $item->updated_at }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
@section('scripts')
  <script>
    $(document).ready(function () {
      $('#table-report').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 5, 10, 50, 100 ],
        pageLength: 10,
      });
    });
  </script>
@endsection