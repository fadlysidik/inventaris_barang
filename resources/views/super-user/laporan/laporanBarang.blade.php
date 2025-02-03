@extends('layout.su')

@section('content')
    <div class="p-8 bg-gradient-to-r from-indigo-50 to-blue-50">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800">Laporan Barang</h1>
        </div>

        <!-- Container -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Filter Section -->
            <div class="bg-white shadow-xl rounded-lg p-8 transform transition-all hover:scale-105 duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Filter Laporan Barang</h2>
                <form action="{{ route('superuser.laporanBarang') }}" method="GET">
                    <div class="space-y-6">
                        <!-- Jenis Barang -->
                        <div class="relative">
                            <label for="jns_brg" class="block text-sm font-medium text-gray-700 mb-2">Jenis Barang</label>
                            <select id="jns_brg" name="jns_brg"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-lg text-gray-700 focus:ring-2 focus:ring-indigo-500 transition-transform duration-300 transform hover:scale-105">
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
                        <div class="relative">
                            <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">Periode</label>
                            <input type="month" id="periode" name="periode"
                                class="block w-full p-4 border border-gray-300 rounded-lg shadow-lg text-gray-700 focus:ring-2 focus:ring-indigo-500 transition-transform duration-300 transform hover:scale-105"
                                value="{{ request('periode') }}">
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
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Hasil Laporan</h2>

                <!-- Pesan Jika Tidak Ada Data -->
                @if (!empty($message))
                    <div class="bg-yellow-200 text-yellow-800 p-4 rounded-lg mb-6">
                        {{ $message }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nama Barang</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Jenis Barang</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangInventaris as $index => $barang)
                                <tr class="border-b hover:bg-indigo-50 transition-colors duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $barang->br_nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $barang->jenis_barang->jns_brg_nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $barang->br_tgl_terima }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
