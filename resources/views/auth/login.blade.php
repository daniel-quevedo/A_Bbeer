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

    <!-- Remember Me -->
    <div class="flex items-center justify-between mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
          name="remember">
        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
      </label>
      @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 dark:hover:text-gray-100 rounded-md"
          href="{{ route('password.request') }}">
          {{ __('Olvidó su contraseña?') }}
        </a>
      @endif
    </div>
    <div class="flex items-center justify-center mt-4">
      <x-primary-button class="ml-3">
        {{ __('Iniciar Sesión') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>
