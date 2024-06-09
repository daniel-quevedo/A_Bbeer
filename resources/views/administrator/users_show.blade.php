@extends('layouts.layout')

@section('título', 'Usuarios')

@section('content')
  <div class="col-12">
    <a href="{{ route('admin.users.store') }}" class="bt bt-success">Agregar Usuarios</a>
  </div>
  <div class="mt-5 table-responsive">
    <div class="text-end m-2">
      <a href="{{ route('admin.users.download') }}" class="bt bt-sm bt-secondary">Descargar plantilla</a>
      <label for="excel-file" class="bt bt-sm bt-info">Subir plantilla</label>
      <input id="excel-file" onchange="importExcel()" type="file" class="d-none" accept=".xlsx, .xls">
    </div>

    <table class="table table-sm table-striped" id="table-users">
      <thead class="table-light">
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Cédula</th>
          <th>Correo</th>
          <th>Ciudad</th>
          <th>Sede</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $item)
          <tr>
            <td>{{ $item->primer_nom }} {{ $item->segundo_nom }}</td>
            <td>{{ $item->primer_ape }} {{ $item->segundo_ape }}</td>
            <td>{{ $item->cedula }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->ciudad }}</td>
            <td>{{ $item->sede }}</td>
            <td>{{ $item->rol }}</td>
            <td>
              <form action="{{ route('admin.users.showEdit') }}" method="post">
                @csrf
                <input type="hidden" name="id" readonly value="{{ $item->id }}">
                <div class="col-12 row">
                  <div class="col-6">
                    <button class="bt-btn bt-edit"><i class="bt-ico fa-solid fa-pen-to-square"></i></button>
                  </div>
                  <div class="col-6">
                    <button formaction="{{ route('admin.users.delete') }}" class="bt-btn bt-del"><i
                        class="bt-ico fa-solid fa-trash"></i></button>
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
  <script src="{{ asset('js/user.js') }}"></script>
@endsection
