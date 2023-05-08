@extends('layouts.layout')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.users.store') }}" class="btn btn-outline-success">Agregar Usuarios</a>
  </div>
  <div class="mt-5">
    <table class="table table-sm table-striped" id="table-users">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Cédula</th>
          <th>Correo</th>
          <th>Edad</th>
          <th>Fecha de nacimiento</th>
          <th>Género</th>
          <th>Ciudad</th>
          <th>País</th>
          <th>Sede</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($users as $item)
          <tr>
            <td>{{ $item->primer_nom }} {{ $item->segundo_nom}}</td>
            <td>{{ $item->primer_ape }} {{ $item->segundo_ape}}</td>
            <td>{{ $item->cedula }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->edad }}</td>
            <td>{{ $item->fecha_nac }}</td>
            <td>{{ $item->genero }}</td>
            <td>{{ $item->ciudad }}</td>
            <td>{{ $item->pais }}</td>
            <td>{{ $item->sede }}</td>
            <td>{{ $item->rol }}</td>
            <td>
              <form action="{{ route('admin.users.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->id }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <button class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                  </div>
                  <div class="col-6">
                    <button formaction="{{ route('admin.users.delete') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#table-users').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
        "lengthMenu": [ 3, 5, 10, 50, 100 ],
        pageLength: 3,
      });
    });
  </script>
@endsection