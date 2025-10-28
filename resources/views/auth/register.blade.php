<x-guest-layout>
    <div class="text-center mb-6">
        <!-- Optional: Logo atau ilustrasi -->
        <div class="flex justify-center mb-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828466.png" 
                 alt="Register Icon" class="w-12 h-12 opacity-90">
        </div>

        <!-- Judul -->
        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-400 to-blue-600 text-transparent bg-clip-text drop-shadow-md">
            {{ __('Buat Akun Baru') }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">Daftarkan dirimu untuk mulai menggunakan layanan kami</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-blue-800" />
            <x-text-input id="name" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm" 
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-800" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm" 
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" class="text-blue-800" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-blue-800" />
            <x-text-input id="password_confirmation" 
                class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-400 rounded-lg shadow-sm"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('login') }}" 
               class="text-sm font-medium text-sky-600 hover:text-blue-700 transition-all">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button 
                class="bg-gradient-to-r from-blue-500 to-sky-400 hover:from-sky-500 hover:to-blue-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                {{ __('Daftar Sekarang') }}
            </x-primary-button>
        </div>
    </form>

   
</x-guest-layout>
