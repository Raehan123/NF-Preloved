@extends('layouts.app')

@section('content')
    <section class="bg-[#A5CEEF] py-12 px-4">
        <div class="max-w-2xl mx-auto text-[#103f65]">
            <h2 class="text-center text-2xl font-bold mb-6">Detail Barang</h2>

                <!-- Gambar Produk -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Produk"
                        class="w-[350px] h-full object-contain bg-white rounded-3xl p-4 border-4 border-[#103f65]" />
                </div>

                <!-- Informasi Produk & Penjual -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <!-- Informasi Produk -->
                    <div class="border border-[#103f65] rounded-xl bg-[#C9E6FF] overflow-hidden">
                        <h3 class="text-center bg-[#103f65] text-white py-2 font-semibold">Informasi Produk</h3>
                        <div class="p-4 flex flex-col gap-4">
                            <p><strong>Nama Produk:</strong> {{ $item->title }}</p>
                            <p><strong>Harga:</strong> Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                            <p><strong>Kategori:</strong> {{ $item->category }}</p>
                            <p><strong>Deskripsi:</strong> {{ $item->description }}</p>
                        </div>
                    </div>

                    <!-- Informasi Penjual -->
                    <div class="border border-[#103f65] rounded-xl bg-[#C9E6FF] overflow-hidden">
                        <h3 class="text-center bg-[#103f65] text-white py-2 font-semibold">Informasi Penjual</h3>
                        <div class="p-4 flex flex-col gap-4">
                            <p><strong>Nama Penjual:</strong> {{ $item->username }}</p>
                            <p><strong>WhatsApp:</strong>
                                <a href="https://wa.me/{{ $item->no_telp }}" target="_blank"
                                    class="text-blue-600 hover:underline">{{ $item->no_telp }}</a>
                            </p>
                            <p><strong>Instagram:</strong>
                                <a href="https://www.instagram.com/{{ $item->instagram }}" target="_blank"
                                    class="text-blue-600 hover:underline">{{ $item->instagram }}</a>
                            </p>
                            <p><strong>Catatan:</strong> {{ $item->notes }}</p>
                        </div>
                    </div>
                </div>

            <!-- Tombol dan Favorite -->
            <div class="flex justify-between items-center">
                <a href="{{ route('dashboard') }}"
                    class="bg-[#103f65] text-white px-5 py-2 rounded-lg font-semibold hover:bg-[#0d3356]">OKAY!</a>
                <div class="flex items-center gap-2">
                    <span class="text-sm">Suka barang ini? Tambahkan ke Favorit!</span>
                    <i class="fa-regular fa-heart text-[#1069A4] text-xl cursor-pointer heart-toggle"></i>
                </div>
            </div>
        </div>
    </section>
@endsection
