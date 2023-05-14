@extends('layouts.layout')

@section('título','Ciudad')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.city.store') }}" class="btn btn-outline-success">Agregar Ciudades</a>
  </div>
  <div class="mt-5 table-responsive">
    <table class="table table-sm table-striped" id="table-city">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($cities as $item)
          <tr>
            <td>{{ $item->ciudad }}</td>
            <td>
              <form action="{{ route('admin.city.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->idCiudad }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                  </div>
                  <div class="col-6">
                    <button formaction="{{ route('admin.city.delete') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                  </div>
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
  <script>
    $(document).ready(function () {
      $('#table-city').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 5, 10, 50, 100 ],
        pageLength: 5,
      });
    });
  </script>
@endsection