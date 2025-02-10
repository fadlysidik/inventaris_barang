@extends('layout.su')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 p-8">
        <div class="w-full max-w-3xl bg-white/70 backdrop-blur-xl shadow-2xl border border-white/30 rounded-3xl p-10 transform transition duration-300 hover:scale-105 hover:shadow-3xl">
            
            <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text text-center mb-8">
                🔄 Form Pengembalian Barang
            </h2>

            <form action="{{ route('superuser.pengembalianBarang.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Pilih Peminjaman -->
                <div>
                    <label for="pb_id" class="text-lg font-semibold text-gray-700 mb-2 block">📦 Pilih Peminjaman</label>
                    <select name="pb_id" id="pb_id" required
                        class="w-full p-4 border border-gray-300 rounded-xl shadow-sm text-lg bg-gray-100 focus:ring-2 focus:ring-indigo-500 transition duration-300">
                        <option value="">-- Pilih Peminjaman --</option>
                        @foreach ($peminjaman as $item)
                            <option value="{{ $item->pb_id }}">
                                {{ $item->siswa->nama_siswa }} - 
                                {{ $item->peminjamanBarang[0]->barangInventaris->br_nama ?? 'Barang Tidak Ditemukan' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Pengembalian -->
                <div>
                    <label for="kembali_tgl" class="text-lg font-semibold text-gray-700 mb-2 block">📅 Tanggal Pengembalian</label>
                    <input type="date" name="kembali_tgl" id="kembali_tgl" required
                        class="w-full p-4 border border-gray-300 rounded-xl shadow-sm text-lg bg-gray-100 focus:ring-2 focus:ring-indigo-500 transition duration-300">
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-gradient-to-r from-red-500 to-gray-600 text-white font-semibold px-12 py-4 rounded-full text-lg shadow-lg hover:scale-110 transform transition duration-300 ease-in-out">
                        ✅ Simpan Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
