@extends('layout.su')

@section('content')
    <div class="p-8 bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen flex flex-col items-center">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text drop-shadow-lg">
                📊 Laporan Barang
            </h1>
        </div>

        <!-- Filter Section (Lebih Kecil) -->
        <div class="w-full max-w-6xl flex flex-wrap gap-4 justify-center items-center">
            <form action="{{ route('superuser.laporanBarang') }}" method="GET" class="flex flex-wrap gap-4">
                
                <!-- Jenis Barang -->
                <div>
                    <label for="jns_brg" class="text-sm font-medium text-gray-700">🛒 Jenis Barang</label>
                    <select id="jns_brg" name="jns_brg"
                        class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500">
                        <option value="">Semua</option>
                        @foreach ($jenisBarangs as $jenis)
                            <option value="{{ $jenis->jns_brg_kode }}" 
                                {{ request('jns_brg') == $jenis->jns_brg_kode ? 'selected' : '' }}>
                                {{ $jenis->jns_brg_nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Periode -->
                <div>
                    <label for="periode" class="text-sm font-medium text-gray-700">📅 Periode</label>
                    <input type="month" id="periode" name="periode"
                        class="p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500"
                        value="{{ request('periode') }}">
                </div>

                <!-- Tombol Cari -->
                <div>
                    <button type="submit" 
                        class="bg-gradient-to-r from-red-500 to-gray-800 text-white text-sm font-bold px-4 py-2 rounded-lg shadow-md hover:scale-105 transition-all duration-300">
                        🔎 Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Laporan Table -->
        <div class="bg-white/70 backdrop-blur-lg shadow-2xl border border-white/30 rounded-3xl p-6 w-full max-w-6xl mt-8 transform transition duration-300 hover:scale-105 hover:shadow-3xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">📃 Hasil Laporan</h2>

            <!-- Pesan Jika Tidak Ada Data -->
            @if (!empty($message))
                <div class="bg-yellow-300 text-yellow-900 p-3 rounded-lg mb-4 text-sm font-semibold">
                    {{ $message }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gradient-to-r from-gray-700 to-gray-900 text-white text-sm">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">No</th>
                            <th class="px-4 py-3 text-left font-semibold">Nama Barang</th>
                            <th class="px-4 py-3 text-left font-semibold">Jenis Barang</th>
                            <th class="px-4 py-3 text-left font-semibold">Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangInventaris as $index => $barang)
                            <tr class="border-b hover:bg-gray-200 transition-colors duration-300">
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $barang->br_nama }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $barang->jenis_barang->jns_brg_nama }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $barang->br_tgl_terima }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
