<!-- Navbar -->
<nav class="bg-[#2069A4] text-white shadow-md h-auto">
    <div class="container mx-auto flex justify-between items-center py-5">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl">
            <span class="text-orange-500 font-bold">NF</span>Preloved
        </a>

        <!-- Search Bar -->
        <div class="relative w-1/3">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fa-solid fa-magnifying-glass text-[#103f65]"></i>
            </span>
            <input type="text" placeholder="Search..."
                class="w-full pl-10 pr-3 py-2 rounded bg-[#A5CEEF] text-[#103f65] focus:outline-none focus:ring-2 focus:ring-[#103f65]" />
        </div>

        <!-- Button Section -->
        <div class="flex items-center gap-9">
            <button class="bg-[#A5CEEF] text-[#103f65] px-4 py-1 rounded font-semibold border border-[#103f65]">
                Jual
            </button>
            <button class="text-[#A5CEEF] text-xl">
                <i class="fa-solid fa-heart"></i>
            </button>
            <!-- Dropdown User -->
            <div class="relative group">
                <!-- Icon User -->
                <button class="text-[#A5CEEF] text-xl focus:outline-none">
                    <i class="fa-solid fa-user"></i>
                </button>

                <!-- Dropdown Menu -->
                <div
                    class="absolute right-0 mt-2 w-32 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-50">
                    <a href="{{ route('logout') ?? '#' }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Logout
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>