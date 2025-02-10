@extends('layout.su')

@section('content')
    <div class="container mx-auto py-12 px-6">

        <!-- Form Penerimaan Barang -->
        <div class="relative bg-white/30 backdrop-blur-xl p-10 rounded-3xl shadow-2xl w-full max-w-3xl mx-auto 
            transform hover:scale-105 transition duration-500 ease-in-out border border-white/20">
            <!-- Hiasan Lingkaran -->
            <div class="absolute -top-10 -left-10 w-24 h-24 bg-pink-500 rounded-full opacity-30"></div>
            <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-blue-500 rounded-full opacity-30"></div>

            <h2 class="text-4xl font-extrabold mb-6 text-center bg-gradient-to-r from-blue-600 to-purple-600 
                text-transparent bg-clip-text animate__animated animate__fadeInUp">
                📦 Form Penerimaan Barang
            </h2>

            <form action="{{ route('superuser.barangStore') }}" method="POST" 
                class="space-y-6 bg-white/60 p-8 rounded-xl shadow-lg backdrop-blur-md border border-white/30">
                @csrf

                <!-- Input Nama Barang -->
                <div class="space-y-2">
                    <label for="nama" class="block text-gray-900 font-semibold text-lg">Nama Barang</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama barang" required
                        class="w-full border border-gray-300 rounded-lg px-6 py-3 text-gray-800 text-lg shadow-sm focus:ring-2 
                        focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 transition duration-300">
                </div>

                <!-- Select Kategori -->
                <div class="space-y-2">
                    <label for="kategori" class="block text-gray-900 font-semibold text-lg">Kategori</label>
                    <select id="kategori" name="kategori" required
                        class="w-full border border-gray-300 rounded-lg px-6 py-3 text-gray-800 text-lg shadow-sm focus:ring-2 
                        focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        <option value="">Pilih Kategori</option>
                        @if (isset($jenisBarang) && $jenisBarang->count())
                            @foreach ($jenisBarang as $kategori)
                                <option value="{{ $kategori->jns_brg_kode }}">{{ $kategori->jns_brg_nama }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>Tidak ada kategori tersedia</option>
                        @endif
                    </select>
                </div>

                <!-- Select Status -->
                <div class="space-y-2">
                    <label for="br_status" class="block text-gray-900 font-semibold text-lg">Status</label>
                    <select id="br_status" name="br_status" required
                        class="w-full border border-gray-300 rounded-lg px-6 py-3 text-gray-800 text-lg shadow-sm focus:ring-2 
                        focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                        <option value="1">✅ Barang Baik</option>
                        <option value="2">⚠️ Barang Kurang Baik</option>
                        <option value="3">❌ Barang Rusak</option>
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-center mt-6">
                    <button type="submit"
                        class="bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold px-10 py-3 
                        rounded-full hover:bg-gradient-to-l transition duration-300 ease-in-out transform hover:scale-110 shadow-md">
                        ✅ Simpan Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
