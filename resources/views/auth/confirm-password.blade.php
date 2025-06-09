<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-semibold">Konfirmasi Password</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Demi keamanan, silakan masukkan password Anda sebelum melanjutkan ke halaman ini.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Input Password -->
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

        <!-- Tombol Konfirmasi -->
        <div class="flex justify-end">
            <x-primary-button>
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
