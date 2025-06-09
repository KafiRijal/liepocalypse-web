<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-semibold">Lupa Password</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
            Masukkan email akun Anda, lalu kami akan mengirimkan link untuk mengatur ulang password Anda.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Alamat Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required autofocus
                          placeholder="contoh@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Tombol Kirim -->
        <div class="flex justify-end">
            <x-primary-button>
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
