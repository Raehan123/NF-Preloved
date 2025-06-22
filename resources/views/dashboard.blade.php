@extends('layouts.app')


@section('content')
    <!-- Welcome Section -->
    <section class="bg-[#A5CEEF] text-center mt-4 mb-8">
        <div class="flex items-center justify-around p-4">
            {{-- gambar kiri --}}
            <div class="w-1/2 xl:w-1/6">
                <img src="{{ asset('assets/img/tangan-uang.png') }}" alt="">
            </div>
            <div class="">
                <h2 class="text-2xl font-bold mb-2 text-[#103f65]">Selamat datang kembali, User!</h2>
                <p class="text-[#103f65]">Cari atau jual barang bekasmu dengan mudah di NF Preloved.</p>
            </div>
            {{-- gambar kanan --}}
            <div class="w-1/2 xl:w-1/6">
                <img src="{{ asset('assets/img/koin.png') }}" alt="">
            </div>
        </div>
    </section>

    <!-- Kategori -->
    <section class="bg-home-bg bg-center bg-cover py-8 mb-8">
        <h3 class="text-center text-3xl font-bold mb-9 text-[#103f65]">Temukan Barang Sesuai Kebutuhanmu</h3>
        <div class="flex justify-center gap-8 flex-wrap px-4">
            <div class="bg-[#A5CEEF] rounded-lg shadow-lg p-6 w-64 text-center">
                <img src={{ asset('assets/img/fashion.png') }} alt="Fashion"
                    class="mx-auto mb-2 w-full object-cover h-[200px] rounded-3xl">
                <div class="mt-5">
                    <h1 class="text-xl font-bold mb-1">Fashion</h1>
                    <p class="text-gray-700 text-sm text-center">Cari outfit keren tapi low budget?
                        Lihat koleksi baju dan aksesoris Disini!</p>
                </div>
            </div>
            <div class="bg-[#A5CEEF] rounded-lg shadow-lg p-6 w-64 text-center">
                <img src={{ asset('assets/img/elektronik.png') }} alt="Elektronik"
                    class="mx-auto mb-2 w-full object-cover h-[200px] rounded-3xl">
                <div class="mt-5">
                    <h1 class="text-xl font-bold mb-1">Gadget</h1>
                    <p class="text-gray-700 text-sm text-center">Dari headset, mouse, sampe charger. Dapetin kebutuhan
                        elektronikmu dengan harga hemat!</p>
                </div>
            </div>
            <div class="bg-[#A5CEEF] rounded-lg shadow-lg p-6 w-64 text-center">
                <img src={{ asset('assets/img/book.png') }} alt="Buku"
                    class="mx-auto mb-2 w-full object-cover h-[200px] rounded-3xl">
                <div class="mt-5">
                    <h1 class="text-xl font-bold mb-1">Buku</h1>
                    <p class="text-gray-700 text-sm text-center">Butuh referensi kuliah atau bacaan santai? Temukan buku
                        bekas yang masih oke punya.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 bg-[#A5CEEF]">
        <h3 class="text-center text-3xl font-bold mb-6">Produk Tersedia</h3>

        <div class="flex flex-wrap justify-center items-center gap-6 max-w-7xl mx-auto">
            @if ($items->count() > 0)
                @foreach ($items as $item)
                    <div
                        class="w-[70%] md:w-[31%] lg:w-[27%] bg-[#CFE9FF] rounded-xl overflow-hidden shadow-md hover:shadow-lg transform hover:scale-[1.02] transition duration-200 ease-in-out p-5">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="w-[300px] h-[300px] object-contain bg-white rounded-3xl p-4">
                        @endif

                        <div class="mt-3 bg-[#CFE9FF]">
                            <h3 class="text-2xl font-semibold text-[#103f65] mb-1">{{ $item->title }}</h3>
                            <p class="text-lg text-gray-600 mb-1">{{ $item->category }}</p>
                            <p class="text-xl text-gray-800 font-bold mb-1">
                                Rp. {{ number_format($item->price, 0, ',', '.') }}
                            </p>

                            <p class="text-lg {{ $item->is_sold ? 'text-red-600' : 'text-green-600' }}">
                                Status: {{ $item->is_sold ? 'Terjual' : 'Tersedia' }}
                            </p>
                            <div class="flex justify-between items-center mt-3">
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="inline-block bg-[#1069A4] text-white text-center rounded-full px-9 py-2 hover:shadow-lg transition duration-300 text-xl">
                                    Detail
                                </a>

                                @php
                                    $inWishlist = Auth::check() && Auth::user()->wishlist->contains($item->id);
                                @endphp

                                <form action="{{ route('wishlist.toggle', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <i
                                            class="{{ $inWishlist ? 'fa-solid text-red-500' : 'fa-regular text-[#1069A4]' }} fa-heart text-2xl hover:text-red-500 transition duration-300"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600 w-full">Tidak ada produk tersedia.</p>
            @endif
        </div>

    </section>

@endsection
