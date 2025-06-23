@extends('layouts.app')



@section('content')
    <div class="container mx-auto p-6">
        {{-- Jumbotron breadcrumb --}}
        @include('jumbotron.produk')
        {{-- Tampilkan pesan sukses --}}
        @if (session('success'))
            <div id="toast-success"
                class="fixed top-5 right-5 z-50 bg-green-200 text-green-800 px-6 py-3 rounded shadow-lg flex items-center space-x-2 animate-slide-in">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif


        @if ($items->count() > 0)
            @if ($items->count() > 0)
                <section class="bg-[#A5CEEF] py-10">

                    <div class="flex flex-wrap gap-6 justify-center">
                        @foreach ($items as $item)
                            <div
                                class="w-full sm:w-[47%] md:w-[30%] lg:w-[22%] bg-white border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg">
                                @if ($item->image)
                                    <div class="w-full h-56 overflow-hidden flex justify-center items-center bg-white">
                                        <img id="imagePreview" src="{{ asset('storage/' . $item->image) }}"
                                            class="w-full h-full object-contain bg-white" />
                                    </div>
                                @else
                                    <img id="imagePreview" class="w-full h-full object-contain bg-white hidden" />
                                    <i id="uploadIcon"
                                        class="fa-solid fa-cloud-arrow-up text-[#2069A4] text-6xl absolute inset-0 flex items-center justify-center z-10 pointer-events-none"></i>
                                @endif


                                <div class="p-4 bg-[#f3faff]">
                                    <h3 class="text-xl font-semibold text-[#103f65] mb-1">{{ $item->title }}</h3>
                                    <p class="text-sm text-gray-600 mb-1">{{ $item->category }}</p>
                                    <p class="text-lg text-gray-800 font-bold mb-1">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm {{ $item->is_sold ? 'text-red-600' : 'text-green-600' }}">
                                            Status: {{ $item->is_sold ? 'Terjual' : 'Tersedia' }}
                                        </p>
                                        <div class="flex items-center gap-6">

                                            {{-- Icon Edit --}}
                                            <a href="{{ route('items.edit', $item->id) }}">
                                                <i
                                                    class="fa-solid fa-pen-to-square text-yellow-500 hover:text-yellow-600 cursor-pointer"></i>
                                            </a>

                                            {{-- Form Delete --}}
                                            <form method="POST" action="{{ route('items.destroy', $item->id) }}"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn">
                                                    <i
                                                        class="fa-solid fa-trash text-red-600 cursor-pointer hover:text-red-800"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="mt-8 w-full flex justify-center">
                        {{ $items->withQueryString()->links() }}
                    </div>

                    <div class="flex justify-center mt-10">
                        <a href="{{ route('items.create') }}"
                            class="bg-[#2069A4] hover:bg-[#1a5c90] text-white font-semibold py-3 px-6 rounded-lg flex items-center gap-2 shadow">
                            <i class="fa-solid fa-plus"></i> Tambah Produk
                        </a>
                    </div>
            @endif
            </section>
        @else
            {{-- Konten utama --}}
            <section class="bg-[#A5CEEF] text-center py-10">
                <h2 class="text-2xl font-bold text-[#103f65]">Kelola Produkmu di NF Preloved</h2>
                <p class="text-[#103f65] mt-2">Tambah, ubah, atau hapus iklan produk kamu kapan pun kamu mau.<br>Yuk, mulai
                    jualan!
                </p>

                <div class="flex justify-center mt-6">
                    <div class="bg-[#d9e9ff] w-11/12 md:w-2/3 lg:w-1/2 p-6 rounded-xl shadow-lg text-center">
                        <h3 class="text-xl font-semibold text-[#103f65] mb-2">Produk Jual Kamu</h3>
                        <p class="text-gray-700 mb-4">Yah! Kosong! kamu belum mengunggah produk apapun.<br>Yuk mulai pasang
                            iklan dan
                            jual barang preloved kamu sekarang!</p>
                        <div class="flex flex-col justify-center h-[100px] p-4">
                            <i class="fa-solid fa-cloud-arrow-up text-[#2069A4] text-6xl mb-2"></i>
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('items.create') }}"
                                    class="bg-[#2069A4] hover:bg-[#1a5c90] text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2">
                                    Tambah Produk
                                </a>
                                <a href="{{ route('items.create') }}"
                                    class="bg-[#2069A4] hover:bg-[#1a5c90] text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
