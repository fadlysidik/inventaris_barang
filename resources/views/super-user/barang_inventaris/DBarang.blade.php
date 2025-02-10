@extends('layout.su')

@section('content')
    <main class="flex-1 p-6">
        <div class="container mx-auto py-8">
            <!-- Judul -->
            <h1 class="text-4xl font-extrabold mb-6 text-center bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-transparent bg-clip-text">
                📦 Daftar Barang Inventaris
            </h1>

            <!-- Container Tabel -->
            <div class="overflow-hidden shadow-2xl rounded-2xl bg-white/30 backdrop-blur-lg p-6">
                <table class="w-full table-auto border-separate border-spacing-0 rounded-xl overflow-hidden shadow-lg">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white text-lg">
                            <th class="px-6 py-4 text-left font-semibold rounded-tl-xl">ID</th>
                            <th class="px-6 py-4 text-left font-semibold">Nama Barang</th>
                            <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                            <th class="px-6 py-4 text-left font-semibold">Status</th>
                            <th class="px-6 py-4 text-left font-semibold rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-white/60">
                        @foreach ($barang as $item)
                            <tr class="hover:bg-indigo-100 transition duration-300 ease-in-out">
                                <td class="px-6 py-4 text-gray-800 font-semibold">{{ $item->br_kode }}</td>
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $item->br_nama }}</td>
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $item->jenis_barang ? $item->jenis_barang->jns_brg_nama : 'Tidak Ada Kategori' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm
                                        @if ($item->br_status == 1)
                                            bg-green-500/20 text-green-700 border border-green-400
                                        @elseif ($item->br_status == 2)
                                            bg-yellow-500/20 text-yellow-700 border border-yellow-400
                                        @elseif ($item->br_status == 3)
                                            bg-red-500/20 text-red-700 border border-red-400
                                        @else
                                            bg-gray-500/20 text-gray-700 border border-gray-400
                                        @endif">
                                        @if ($item->br_status == 1)
                                            ✅ Barang Baik
                                        @elseif ($item->br_status == 2)
                                            ⚠️ Barang Kurang Baik
                                        @elseif ($item->br_status == 3)
                                            ❌ Barang Rusak
                                        @else
                                            ❓ Tidak Ada Status
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        <a href="#" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-xl shadow-md hover:bg-blue-700 transition duration-300 flex items-center">
                                            ✏️ Edit
                                        </a>
                                        <a href="#" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-xl shadow-md hover:bg-red-700 transition duration-300 flex items-center">
                                            🗑 Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
