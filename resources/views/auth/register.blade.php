<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NF Preloved</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f0f2f5]">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-[1100px] bg-[#2069A4] text-white rounded-2xl shadow-lg flex overflow-hidden relative py-10">
            
            <!-- Kiri - Form Register -->
            <div class="w-[55%] flex flex-col items-center justify-start px-10 pt-4 pb-6 text-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo NF Preloved" class="w-36 mb-2">
                <h2 class="text-2xl font-semibold mt-2">Buat Akun Baru</h2>
                <p class="text-sm text-white mt-1 mb-6 max-w-md">
                    Daftarkan diri kamu dan mulai transaksi jual beli barang bekas di NF Preloved
                </p>

                <!-- Form Register -->
                <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm flex flex-col gap-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="text-left text-white" />
                        <x-text-input id="name" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="text" name="name" :value="old('name')" required autofocus placeholder="Nama Lengkap" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Kampus')" class="text-left text-white" />
                        <x-text-input id="email" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="email" name="email" :value="old('email')" required placeholder="Email Kampus" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- NIM -->
                    <div>
                        <x-input-label for="nim" :value="__('NIM')" class="text-left text-white" />
                        <x-text-input id="nim" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="text" name="nim" :value="old('nim')" required placeholder="Nomor Induk Mahasiswa" />
                        <x-input-error :messages="$errors->get('nim')" class="mt-1" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Nomor WhatsApp')" class="text-left text-white" />
                        <x-text-input id="phone" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="text" name="phone" :value="old('phone')" required placeholder="08xxxxxxxxxx" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-left text-white" />
                        <x-text-input id="password" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="password" name="password" required placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-left text-white" />
                        <x-text-input id="password_confirmation" class="mt-1 block w-full bg-[#CFE9FF] border-[#2A506F] text-[#103F65] placeholder:text-[#2069A4] rounded-md" type="password" name="password_confirmation" required placeholder="Ulangi Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Action -->
                    <div class="flex items-center justify-between mt-2">
                        <a class="text-sm underline text-white hover:text-gray-300" href="{{ route('login') }}">
                            {{ __('Sudah punya akun?') }}
                        </a>
                        <x-primary-button class="bg-[#103F65] hover:bg-[#2A506F]">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Kanan - Welcome -->
            <div class="w-[45%] border-l-[3px] border-white px-10 py-10 flex flex-col justify-center items-center text-left">
                <img src="{{ asset('assets/img/rumah.png') }}" alt="Ilustrasi Rumah" class="w-full max-w-xs mb-3">
                <h3 class="text-xl font-semibold mb-2">Bergabung dengan Komunitas NF Preloved</h3>
                <p class="text-sm leading-relaxed text-white">
                    Yuk jadi bagian dari platform jual beli barang bekas mahasiswa STT-NF! Daftar sekarang dan mulai bertransaksi.
                </p>
            </div>

            <!-- Copyright -->
            <p class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-xs text-white whitespace-nowrap">
                © 2025 NF Preloved - STT Terpadu Nurul Fikri - All rights reserved
            </p>
        </div>
    </div>
</body>
</html>
