@extends('layouts.app')

@section('content')
    @include('jumbotron.form-produk')
    <div class="min-h-screen bg-[#A5CEEF] flex items-center justify-center py-10">
        <div class="bg-[#d9eafd] p-8 rounded-lg shadow-md w-full max-w-3xl">
            <h2 class="text-2xl font-bold text-center text-[#103f65] mb-6">Edit Produk</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <strong>Ada error:</strong>
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Upload Gambar --}}
                <div class="flex flex-col items-center mb-6">
                    <label for="imageUpload"
                        class="cursor-pointer relative w-60 h-56 mb-2 rounded-xl overflow-hidden border-2 border-dashed border-[#2069A4] bg-white">
                        @if ($item->image)
                            <img id="imagePreview" src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-full object-fill absolute inset-0 z-20 rounded-xl" />
                        @else
                            <i id="uploadIcon"
                                class="fa-solid fa-cloud-arrow-up text-[#2069A4] text-6xl absolute inset-0 flex items-center justify-center z-10 pointer-events-none"></i>
                        @endif
                    </label>

                    <input type="file" name="image" id="imageUpload" accept="image/*" class="hidden" />
                    <label for="imageUpload" class="text-[#103f65] font-semibold mt-2">Ganti Gambar</label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Nama Produk:</label>
                        <input type="text" name="title" value="{{ old('title', $item->title) }}"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Informasi Penjual:</label>
                        <input type="text" name="username" value="{{ old('username', $item->username) }}"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Harga:</label>
                        <input type="text" name="price" value="{{ old('price', $item->price) }}"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">WhatsApp:</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $item->no_telp) }}"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Kategori:</label>
                        <select name="category"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                            <option value="" hidden>Pilih Kategori</option>
                            <option value="Pakaian" {{ $item->category === 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                            <option value="Elektronik" {{ $item->category === 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                            <option value="Buku" {{ $item->category === 'Buku' ? 'selected' : '' }}>Buku</option>
                            <option value="Lainnya" {{ $item->category === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Instagram:</label>
                        <input type="text" name="instagram" value="{{ old('instagram', $item->instagram) }}"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]" required>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Deskripsi:</label>
                        <textarea name="description" rows="3"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]">{{ old('description', $item->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Catatan:</label>
                        <textarea name="notes" rows="3"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]">{{ old('notes', $item->notes) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[#103f65] font-medium mb-1">Status:</label>
                        <select name="is_sold"
                            class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]">
                            <option value="0" {{ $item->is_sold == 0 ? 'selected' : '' }}>Tersedia</option>
                            <option value="1" {{ $item->is_sold == 1 ? 'selected' : '' }}>Terjual</option>
                        </select>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="text-center">
                    <button type="submit"
                        class="bg-[#103f65] text-white px-6 py-2 rounded hover:bg-[#0b2f4a] transition duration-300">
                        Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
