<section>
  <div class="card">
    <div class="card-header">
      <h2>Mis Datos</h2>
      <p class="mt-1 text-sm text-secondary">
        Actualiza tus datos básicos aquí
      </p>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        <div class="col-12 row">
          <div class="form-group col-6">
            <label for="" class="form-label">Primer nombre</label>
            <input type="text" name="primer_nom" class="form-control" value="{{ old('primer_nom', $user->primer_nom) }}" required>
          </div>
          <div class="form-group col-6">
            <label for="" class="form-label">Segundo nombre</label>
            <input type="text" name="segundo_nom" class="form-control" value="{{ old('segundo_nom', $user->segundo_nom) }}">
          </div>
        </div>
        <div class="col-12 row">
          <div class="form-group col-6">
            <label for="" class="form-label">Primer apellido</label>
            <input type="text" name="primer_ape" class="form-control" value="{{ old('primer_ape', $user->primer_ape) }}" required>
          </div>
          <div class="form-group col-6">
            <label for="" class="form-label">Segundo apellido</label>
            <input type="text" name="segundo_ape" class="form-control" value="{{ old('segundo_ape', $user->segundo_ape) }}" required>
          </div>
        </div>
        <div class="col-12 row">
          <div class="form-group col-6">
            <label for="" class="form-label">Correo electrónico</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
          </div>
          <div class="form-group col-6">
            <label for="" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nac" class="form-control" value="{{ old('fecha_nac', $user->fecha_nac) }}" required>
          </div>
        </div>
        <div class="col-12 row">
          <div class="form-group col-6">
            <label for="" class="form-label">Género</label>
            <select name="genero" class="form-control">
              <option value="" selected disabled>Seleccione...</option>
              <option value="1" {{ ($user->id_genero == 1) ? 'selected' : '' }}>Hombre</option>
              <option value="2" {{ ($user->id_genero == 2) ? 'selected' : '' }}>Mujer</option>
              <option value="3" {{ ($user->id_genero == 3) ? 'selected' : '' }}>Otro</option>
            </select>
          </div>
          <div class="form-group col-6">
            <label for="" class="form-label">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $user->cedula) }}">
          </div>
        </div>
        <div class="col-12 row mt-5">
          <div class="form-group">
            <label for="" class="form-label">Foto de perfil</label>
            <input type="file" name="foto_perfil" id="foto_perfil" class="form-control" accept="image/*">
          </div>
        </div>
        <div class="mt-3 col-12">
          <x-primary-button class="btn btn-secondary">Guardar</x-primary-button>
        </div>
      </form>
    </div>
  </div>
</section>
