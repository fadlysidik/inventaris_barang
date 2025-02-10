@extends('layout.su')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 p-6">
    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-2xl transform transition-all hover:scale-105">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Edit Jenis Barang</h2>
        <form action="{{ route('superuser.jenisBarang.update', $jenisBarang->jns_brg_kode) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="jns_brg_kode" class="block text-sm font-semibold text-gray-700">Kode Jenis Barang</label>
                <input type="text" name="jns_brg_kode" id="jns_brg_kode" value="{{ $jenisBarang->jns_brg_kode }}" readonly
                       class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-200 cursor-not-allowed focus:outline-none">
            </div>
            <div class="mb-6">
                <label for="jns_brg_nama" class="block text-sm font-semibold text-gray-700">Nama Jenis Barang</label>
                <input type="text" name="jns_brg_nama" id="jns_brg_nama" value="{{ $jenisBarang->jns_brg_nama }}" required
                       class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-500 text-white py-3 rounded-lg shadow-md text-lg font-semibold
                                    transition-all duration-300 hover:from-red-500 hover:to-gray-500 hover:shadow-xl">Update</button>
        </form>
    </div>
</div>
@endsection