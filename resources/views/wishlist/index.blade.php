@extends('layouts.app')

@section('content')
    <div class="bg-[#A5CEEF] min-h-screen py-10 px-4 font-sans">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            @include('jumbotron.favorite')

            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-[#1D3F65]">Favorite, User!</h1>
                <p class="text-[#3A3A3C] mt-2">List produk favoritmu dan hubungi penjual kapan pun kamu siap membeli.<br>Yuk
                    Beli!</p>
            </div>

            <!-- List Wishlist -->
            <div class="space-y-4">
                @foreach ($items as $item)
                    <div class=" flex flex-col items-center gap-4">
                        <div class="flex flex-row items-center justify-between w-[70rem] bg-[#d9e9ff] p-4 rounded-xl shadow-md">
                            <div class="flex flex-row items-center gap-4">
                                <!-- Image -->
                                @if ($item->image)
                                    <div
                                        class="w-24 h-24 border-4 border-[#2069A4] rounded-full overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                @endif

                                <!-- Info -->
                                <div class="flex flex-col text-[#3A3A3C] text-sm space-y-1">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-box w-5 text-center text-[#8E8E93]"></i>
                                        <span>{{ $item->title }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-tag w-5 text-center text-[#8E8E93]"></i>
                                        <span>Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <i class="fab fa-whatsapp w-5 text-center text-[#8E8E93]"></i>
                                        <span>
                                            Hubungi Penjual:
                                            <a href="https://wa.me/{{ $item->no_telp }}"
                                                class="underline break-all">{{ $item->no_telp }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Actions -->
                            <div class="flex items-center gap-3 mt-2 sm:mt-0">
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="bg-[#2069A4] text-white px-4 py-2 rounded-lg text-sm font-semibold">Detail</a>
                                <form action="{{ route('wishlist.toggle', $item->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-10 h-10 border-2 border-[#E44141] text-[#E44141] rounded-full hover:bg-[#E44141] hover:text-white">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-10 h-10 border-2 border-[#2069A4] text-[#2069A4] rounded-full hover:bg-[#2069A4] hover:text-white">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#2069A4] text-[#CFE9FF] text-center text-sm py-6 mt-10 rounded-lg">
            &copy; {{ date('Y') }} NF Preloved - STT Terpadu Nurul Fikri - All rights reserved
        </footer>
    </div>
@endsection
