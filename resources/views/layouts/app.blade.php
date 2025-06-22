<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/138e30ea05.js" crossorigin="anonymous"></script>
    <title>NF Preloved</title>
    @vite('resources/css/app.css')
    @vite('resources/js/imagePreview.js')
    @vite('resources/js/heartToggle.js')
    @vite('resources/js/popup.js')
    @vite('resources/js/popupDelete.js')
    @vite('resources/js/toggle.js')
</head>
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<body class="bg-[#d9e9ff] text-gray-800 font-poppins">

    <!-- Navbar -->
    <nav class="bg-[#2069A4] text-white shadow-md">
        <div
            class="container mx-auto flex flex-col md:flex-row md:justify-between items-center gap-y-4 gap-x-6 py-4 px-4">
            <!-- Logo -->
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="{{ url('/dashboard') }}" class="text-2xl font-bold text-white">
                    <span class="text-orange-400">NF</span>Preloved
                </a>

                <!-- Hamburger (Mobile only) -->
                <button id="menu-toggle" class="md:hidden text-white text-2xl focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <!-- Menu Items -->
            <div id="mobile-menu"
                class="w-full md:flex md:items-center md:w-auto hidden flex-col md:flex-row gap-4 md:gap-6 mt-4 md:mt-0">

                <!-- Search & Filter -->
                <div class="flex flex-col md:flex-row gap-3 w-full md:w-[450px]">
                    <!-- Search -->
                    <form method="GET"
                        action="{{ request()->routeIs('dashboard') ? route('dashboard') : route('items.index') }}"
                        class="relative w-full">
                        <button type="submit" class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fa-solid fa-magnifying-glass text-[#103f65]"></i>
                        </button>
                        <input type="text" name="search" placeholder="Search produk..."
                            class="w-full pl-10 pr-3 py-2 rounded bg-[#A5CEEF] text-[#103f65] focus:outline-none focus:ring-2 focus:ring-[#103f65]"
                            value="{{ request('search') }}" />
                    </form>

                    <div class="flex flex-wrap gap-3 w-full md:w-[600px]">
                        <!-- Filter & Sort -->
                        <form method="GET" action="{{ route('items.index') }}" class="flex gap-3 w-full">
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">

                            <select name="status" onchange="this.form.submit()"
                                class="bg-[#A5CEEF] text-[#103f65] p-auto rounded focus:outline-none w-full">
                                <option value="" hidden>Status</option>
                                <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>
                                    Tersedia</option>
                                <option value="terjual" {{ request('status') == 'terjual' ? 'selected' : '' }}>Terjual
                                </option>
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status
                                </option>
                            </select>

                            <select name="sort" onchange="this.form.submit()"
                                class="bg-[#A5CEEF] text-[#103f65] p-auto rounded focus:outline-none w-full">
                                <option value="" hidden>Urutkan</option>
                                <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Termurah
                                </option>
                                <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Termahal
                                </option>
                                <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru
                                </option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-6 mt-4 md:mt-0">
                    <!-- Jual -->
                    <a href="{{ route('items.index') }}"
                        class="bg-[#A5CEEF] text-[#103f65] px-4 py-1 rounded font-semibold hover:bg-[#89c1ee]">
                        Jual
                    </a>

                    <!-- Heart Icon -->
                    <a href={{ route('wishlist.index') }}
                        class="text-[#A5CEEF] text-xl hover:text-white active:text-red-500 ">
                        <i class="fas fa-heart"></i>
                    </a>

                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center text-[#A5CEEF] text-xl focus:outline-none">
                            <i class="fa-solid fa-user"></i>
                            <p class="ml-2 text-lg">{{ Auth::user()->name }}</p>
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div
                                class="absolute right-0 mt-2 w-32 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-50">
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-[calc(100vh-140px)]"> {{-- Biar footer di bawah --}}
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#2069A4] text-white text-center py-4 mt-8">
        &copy; 2025 NF Preloved · STT Terpadu Nurul Fikri · All rights reserved
    </footer>

</body>

</html>
