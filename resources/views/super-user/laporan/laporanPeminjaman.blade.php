@extends('layout.su')

@section('content')
    <div class="p-10 bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen flex flex-col items-center">

        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-gray-900 text-transparent bg-clip-text drop-shadow-lg">
                📄 Laporan Peminjaman
            </h1>
        </div>

        <!-- Filter Peminjaman -->
        <div class="w-full max-w-7xl bg-white/50 backdrop-blur-md border border-gray-200 rounded-lg shadow-md p-5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <form action="{{ route('superuser.laporanPeminjaman') }}" method="GET" class="flex flex-wrap items-center gap-4 w-full">
                
                <!-- Nama Peminjam -->
                <div class="flex flex-col">
                    <label for="siswa" class="text-sm font-medium text-gray-700">🧑‍🎓 Siswa</label>
                    <input type="text" id="siswa" name="siswa" value="{{ request('siswa') }}"
                        placeholder="Cari nama peminjam..."
                        class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Tanggal Peminjaman -->
                <div class="flex flex-col">
                    <label for="tanggal_peminjaman" class="text-sm font-medium text-gray-700">📅 Tanggal Peminjaman</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman"
                        value="{{ request('tanggal_peminjaman') }}"
                        class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Status Peminjaman -->
                <div class="flex flex-col">
                    <label for="status_peminjaman" class="text-sm font-medium text-gray-700">📌 Status</label>
                    <select id="status_peminjaman" name="status_peminjaman"
                        class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua</option>
                        <option value="Dipinjam" {{ request('status_peminjaman') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ request('status_peminjaman') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="Terlambat" {{ request('status_peminjaman') == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                    </select>
                </div>

                <!-- Tombol Cari -->
                <button type="submit" class="bg-gradient-to-r from-gray-600 to-red-700 text-white font-bold px-6 py-2 rounded-lg shadow-md hover:scale-105 transition-all duration-300">
                    🔎 Cari
                </button>
            </form>
        </div>

        <!-- Laporan Table -->
        <div class="w-full max-w-7xl mt-8">
            <div class="bg-white/70 backdrop-blur-lg border border-gray-200 shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">📃 Hasil Laporan Peminjaman</h2>

                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-gray-700 to-gray-900 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Siswa</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Nama Barang</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Peminjaman</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Kembali</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamanData as $index => $peminjaman)
                                @foreach ($peminjaman->peminjamanBarang as $barang)
                                    <tr class="border-b hover:bg-blue-100 transition-all duration-200">
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->siswa->nama_siswa }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $barang->barangInventaris->br_nama }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->pb_tgl->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $peminjaman->pb_harus_kembali_tgl->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            @if ($peminjaman->pb_stat == 0)
                                                <span class="px-3 py-1 bg-green-200 text-green-800 rounded-lg">✔️ Sudah Kembali</span>
                                            @else
                                                <span class="px-3 py-1 bg-red-200 text-red-800 rounded-lg">❌ Belum Kembali</span>
                                            @endif
                                        </td>
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
