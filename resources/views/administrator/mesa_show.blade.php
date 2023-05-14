@extends('layouts.layout')

@section('título','Mesa')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.mesa.store') }}" class="btn btn-outline-success">Agregar Mesa</a>
  </div>
  <div class="mt-5">
    <table class="table table-sm table-striped" id="table-mesa">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Sede</th>
          <th>País</th>
          <th>Ciudad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($mesas as $item)
          <tr>
            <td>{{ $item->mesa }}</td>
            <td>{{ $item->sede }}</td>
            <td>{{ $item->pais }}</td>
            <td>{{ $item->ciudad }}</td>
            <td>
              <form action="{{ route('admin.mesa.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->idMesa }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                  </div>
                  <div class="col-6">
                    <button formaction="{{ route('admin.mesa.delete') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
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
      $('#table-mesa').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 3, 5, 10, 50, 100 ],
        pageLength: 3,
      });
    });
  </script>
@endsection