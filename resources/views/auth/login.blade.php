<x-guest-layout>
    <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}" >
    @csrf

    <!-- Email Address -->
    <div class="text-center pt-4">
      <h1 class="text-white text-xl mb-4 mt-4">Iniciar Sesión</h1>
    </div>
    <div class="pt-4">
      <x-input-label for="email" :value="__('Correo')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Contraseña')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex items-center justify-center mt-4 pt-4">
      <x-primary-button class="ml-3">
        {{ __('Iniciar Sesión') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
