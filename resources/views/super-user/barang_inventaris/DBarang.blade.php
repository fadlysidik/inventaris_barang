@extends('layout.SU')

@section('content')
<style>
    
</style>
<main class="flex-1 p-6">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-extrabold mb-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text">
            Daftar Barang
        </h1>
        <div class="overflow-hidden shadow-lg rounded-lg">
            <table class="w-full table-auto bg-gradient-to-br rounded-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                        <th class="px-6 py-4 text-left text-lg font-semibold">ID</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold">Nama Barang</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold">Kategori</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($barang as $item)
                        <tr class="transition duration-200 ease-in-out">
                            <td class="px-6 py-4 text-gray-700 font-medium">{{ $item->br_kode }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->br_nama }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $item->jenis_barang ? $item->jenis_barang->jns_brg_nama : 'Tidak Ada Kategori' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-4">
                                    <a href="#" class="px-4 py-2 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">Edit</a>
                                    <a href="#" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300">Hapus</a>
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