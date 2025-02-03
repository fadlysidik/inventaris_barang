@extends('layout.su')

@section('content')
    <div class="p-8 bg-gradient-to-r from-indigo-50 to-blue-50">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800">Laporan Peminjaman</h1>
        </div>

        <!-- Container -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Filter Section -->
            <div class="bg-white shadow-xl rounded-lg p-8 transform transition-all hover:scale-105 duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Filter Peminjaman</h2>
                <form action="{{ route('superuser.laporanPeminjaman') }}" method="GET">
                    <div class="space-y-6">
                        <!-- Nama Peminjam -->
                        <div class="relative">
                            <label for="siswa" class="block text-sm font-medium text-gray-700 mb-2">Siswa</label>
                            <input type="text" id="siswa" name="siswa" value="{{ request('siswa') }}"
                                placeholder="Cari nama peminjam..."
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-lg text-gray-700 focus:ring-2 focus:ring-indigo-500 transition-transform duration-300 transform hover:scale-105">
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="relative">
                            <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman</label>
                            <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                                value="{{ request('tanggal_peminjaman') }}"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-lg text-gray-700 focus:ring-2 focus:ring-indigo-500 transition-transform duration-300 transform hover:scale-105">
                        </div>

                        <!-- Status Peminjaman -->
                        <div class="relative">
                            <label for="status_peminjaman" class="block text-sm font-medium text-gray-700 mb-2">Status Peminjaman</label>
                            <select id="status_peminjaman" name="status_peminjaman"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-lg text-gray-700 focus:ring-2 focus:ring-indigo-500 transition-transform duration-300 transform hover:scale-105">
                                <option value="">Semua</option>
                                <option value="Dipinjam" {{ request('status_peminjaman') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Dikembalikan" {{ request('status_peminjaman') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                <option value="Terlambat" {{ request('status_peminjaman') == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                            </select>
                        </div>

                        <!-- Tombol Cari -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white font-bold px-8 py-3 rounded-lg shadow-xl hover:bg-gradient-to-l transition-all duration-300">
                                Tampilkan Laporan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Laporan Table -->
            <div class="bg-white shadow-xl rounded-lg p-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Hasil Laporan Peminjaman</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Siswa</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nama Barang</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Peminjaman</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Kembali</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamanData as $index => $peminjaman)
                                @foreach ($peminjaman->peminjamanBarang as $barang)
                                    <tr class="border-b hover:bg-indigo-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $peminjaman->siswa->nama_siswa }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $barang->barangInventaris->br_nama }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $peminjaman->pb_tgl->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $peminjaman->pb_harus_kembali_tgl->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $peminjaman->pb_stat }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
