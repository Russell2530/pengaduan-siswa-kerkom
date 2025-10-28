<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <!-- Icon / Logo -->
        <div class="flex justify-center mb-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828469.png" 
                 alt="Login Icon" class="w-12 h-12 opacity-90">
        </div>

        <!-- Judul -->
        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-400 to-blue-600 text-transparent bg-clip-text drop-shadow-md">
            {{ __('Masuk ke Akun Anda') }}
        </h2>
        <p class="text-sm text-gray-400 mt-1">Selamat datang kembali! Silakan masuk untuk melanjutkan</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-800" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm" 
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" class="text-blue-800" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-2">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" 
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-400" 
                    name="remember">
                <span class="ms-2 text-sm text-gray-700">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-sky-600 hover:text-blue-700 transition-all" 
               href="{{ route('password.request') }}">
                {{ __('Lupa kata sandi?') }}
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-md hover:bg-gray-100 hover:text-gray-800 transition-all duration-200">
                    Belum punya akun?
                </a>

                <x-primary-button 
                    class="bg-gradient-to-r from-blue-500 to-sky-400 hover:from-sky-500 hover:to-blue-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </div>
    </form>

   
</x-guest-layout>
