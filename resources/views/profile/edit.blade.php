@extends('../layouts.layout')

@section('content')
<div class="py-12">
  <div class="col-12">
    @include('profile.partials.update-profile-information-form')
  </div>
  <div class="mt-3 col-12">
    @include('profile.partials.update-password-form')
  </div>
</div>
@endsection
@section('scripts')
  <script>
    const fileInput = document.getElementById('foto_perfil');
    fileInput.addEventListener('change', function() {
      const file = fileInput.files[0];
      const fileType = file.type;
      const validImageTypes = /image\/.*/;

      if (!validImageTypes.test(fileType)) {
        alert('Por favor, seleccione un archivo de imagen válido.');
        fileInput.value = ''; // Limpia el campo de entrada de archivo
      }
    });
  </script>
@endsection
