    @extends('layouts.app')

    @section('content')
        @include('jumbotron.form-produk')
        <div class="min-h-screen bg-[#A5CEEF] flex items-center justify-center py-10">
            <div class="bg-[#d9eafd] p-8 rounded-lg shadow-md w-full max-w-3xl">
                <h2 class="text-2xl font-bold text-center text-[#103f65] mb-6">Tambah Produk</h2>
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


                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Upload Gambar --}}
                    <div class="flex flex-col items-center mb-6">
                        <label for="imageUpload"
                            class="cursor-pointer relative w-60 h-56 mb-2 rounded-xl overflow-hidden border-2 border-dashed border-[#2069A4] bg-white">
                            {{-- Icon awan (default) --}}
                            <i id="uploadIcon"
                                class="fa-solid fa-cloud-arrow-up text-[#2069A4] text-6xl absolute inset-0 flex items-center justify-center z-10 pointer-events-none"></i>

                            {{-- Preview gambar --}}
                            <img id="imagePreview" src="#" alt="Preview"
                                class="hidden w-full h-full object-fill absolute inset-0 z-20 rounded-xl" />
                        </label>

                        <input type="file" name="image" id="imageUpload" accept="image/*" class="hidden" />

                        <label for="imageUpload" class="text-[#103f65] font-semibold mt-2">Upload Gambar</label>
                    </div>





                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Kolom Kiri --}}
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Nama Produk:</label>
                            <input type="text" name="title"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Isi nama produk kamu" required>
                        </div>
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Informasi Penjual:</label>
                            <input type="text" name="username"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Isi nama kamu" required>
                        </div>

                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Harga:</label>
                            <input type="text" name="price"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Berapa harga nya? Isi yaa" required>
                        </div>
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">WhatsApp:</label>
                            <input type="text" name="no_telp"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Berapa No WA kamu? Isi yaa" required>
                        </div>

                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Kategori:</label>
                            <select name="category"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                required>
                                <option value="" hidden>Pilih Kategori</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Buku">Buku</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Instagram:</label>
                            <input type="text" name="instagram"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Isi Instagram kamu!" required>
                        </div>

                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Deskripsi:</label>
                            <textarea name="description" rows="3"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Ceritain keunikan barang kamu! Bekas tapi masih kece? Atau edisi langka? Tulis di sini yaa"></textarea>
                        </div>
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Catatan:</label>
                            <textarea name="notes" rows="3"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]"
                                placeholder="Boleh banget kasih alasan kenapa kamu jual atau kondisi barangnya."></textarea>
                        </div>
                        <div>
                            <label class="block text-[#103f65] font-medium mb-1">Status:</label>
                            <select name="is_sold"
                                class="w-full p-3 rounded-xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1069A4]">
                                <option value="0">Tersedia</option>
                                <option value="1">Terjual</option>
                            </select>
                        </div>
                    </div>




                    {{-- Submit --}}
                    <div class="text-center">
                        <button type="submit"
                            class="bg-[#103f65] text-white px-6 py-2 rounded hover:bg-[#0b2f4a] transition duration-300">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
