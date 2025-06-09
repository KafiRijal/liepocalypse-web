<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold">Login ke Liepocalypse</h1>
        <p class="text-sm text-gray-500">Masukkan email dan password untuk mulai menggunakan sistem</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required autofocus
                          placeholder="contoh@email.com"
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="'Password'" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          placeholder="********"
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>

        <!-- Link ke Register -->
        <div class="text-sm text-center mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-800">
                Daftar sekarang
            </a>
        </div>
    </form>
</x-guest-layout>
