<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold">Daftar Akun Liepocalypse</h1>
        <p class="text-sm text-gray-500">Silakan isi data di bawah untuk membuat akun baru</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <x-input-label for="name" :value="'Nama Lengkap'" />
            <x-text-input id="name" class="block mt-1 w-full"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required autofocus
                          placeholder="Masukkan nama lengkap"
                          autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
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
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="'Konfirmasi Password'" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          placeholder="********"
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Aksi -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                Sudah punya akun? Login
            </a>

            <x-primary-button class="ml-3">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
