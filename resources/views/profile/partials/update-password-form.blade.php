<section>
  <div class="card">
    <div class="card-header">
      <h2>Actualizar contraseña</h2>
      <p class="mt-1 text-sm text-secondary">
        Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.
      </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 m-4">
        @csrf
        @method('put')

        <div class="form-group">
          <x-input-label for="current_password" :value="__('Contraseña actual')" />
          <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
          <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-group">
          <x-input-label for="password" :value="__('Nueva contraseña')" />
          <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
          <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
          <x-input-label for="password_confirmation" :value="__('Confirma la contraseña')" />
          <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
          <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-3">
          <x-primary-button class="btn btn-secondary">Guardar</x-primary-button>
        </div>
    </form>
  </div>
</section>
