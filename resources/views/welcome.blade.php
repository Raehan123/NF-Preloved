@extends('layouts.app')

<body class="bg-[#f0f2f5]">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div
            class="w-full max-w-[1100px] bg-[#2069A4] text-white rounded-2xl shadow-lg flex flex-col lg:flex-row overflow-hidden relative py-8 lg:py-16">

            <!-- Gambar Rumah -->
            <div class="order-1 lg:order-2 w-full lg:w-[45%] border-b-[3px] lg:border-b-0 lg:border-l-[3px] border-white px-6 lg:px-10 py-8 flex flex-col justify-center items-center text-center lg:text-left">
                <img src="{{ asset('assets/img/rumah.png') }}" alt="Ilustrasi Rumah" class="w-full max-w-xs mb-3">
                <h3 class="text-xl font-semibold mb-2">Selamat Datang di NF Preloved</h3>
                <p class="text-sm leading-relaxed text-white">
                    Platform jual beli barang bekas antar mahasiswa STT-NF. Temukan kebutuhanmu atau jual barang tak
                    terpakai dengan mudah dan aman.
                </p>
            </div>

            <!-- Form Login -->
            <div class="order-2 lg:order-1 w-full lg:w-[55%] flex flex-col items-center justify-start px-6 lg:px-10 pt-6 pb-6 text-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo NF Preloved" class="w-36 mb-2">
                <h2 class="text-2xl font-semibold mt-2">Yuk, Login Dulu!</h2>
                <p class="text-sm text-white mt-1 mb-6 max-w-md">
                    Masuk pakai akun kampus kamu untuk mulai belanja dan jual barang di NF Preloved
                </p>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm flex flex-col gap-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-left text-white" />
                        <x-text-input id="email"
                            class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] placeholder-opacity-90 rounded-md"
                            type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-left text-white" />
                        <x-text-input id="password"
                            class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] placeholder-opacity-90 rounded-md"
                            type="password" name="password" required autocomplete="current-password"
                            placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-white">{{ __('Remember me') }}</label>
                    </div>

                    <!-- Tombol Login & Google -->
                    <div class="flex flex-col gap-2">
                        <x-primary-button class="w-full bg-[#103F65] hover:bg-[#2A506F]">
                            {{ __('Log in') }}
                        </x-primary-button>

                        <div class="w-full h-[1.5px] bg-white rounded my-2"></div>

                        <a href="#"
                            class="w-full bg-white text-gray-700 flex items-center justify-center gap-2 py-2 rounded-md hover:bg-gray-100 transition">
                            <img src="{{ asset('assets/img/logo-google.png') }}" alt="Google Logo" class="w-5 h-5">
                            Log in with Google
                        </a>
                    </div>

                    <!-- Lupa Password & Register -->
                    <div class="text-sm flex flex-col sm:flex-row justify-between items-center mt-2 gap-2 text-center">
                        @if (Route::has('password.request'))
                            <a class="underline text-white hover:text-gray-300" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <a href="{{ route('register') }}" class="underline text-white hover:text-gray-300">
                            Belum punya akun?
                        </a>
                    </div>
                </form>
            </div>

            <!-- Copyright -->
            <p class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-xs text-white text-center px-4">
                © 2025 NF Preloved - STT Terpadu Nurul Fikri - All rights reserved
            </p>
        </div>
    </div>
</body>

