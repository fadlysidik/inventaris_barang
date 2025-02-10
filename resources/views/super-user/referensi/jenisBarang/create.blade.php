@extends('layout.su')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-gray-100 to-gray-200 p-6">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg transform transition-all duration-500 hover:scale-105">
        <h2 class="text-4xl font-extrabold text-black-700 text-center mb-6">Tambah Jenis Barang</h2>
        <form action="{{ route('superuser.jenisBarang.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="jns_brg_kode" class="block text-sm font-medium text-gray-700">Kode Jenis Barang</label>
                <input type="text" name="jns_brg_kode" id="jns_brg_kode" required
                    class="mt-1 block w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
            </div>
            <div>
                <label for="jns_brg_nama" class="block text-sm font-medium text-gray-700">Nama Jenis Barang</label>
                <input type="text" name="jns_brg_nama" id="jns_brg_nama" required
                    class="mt-1 block w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
            </div>
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-red-500 to-gray-500 text-white text-lg font-semibold rounded-xl shadow-md hover:opacity-90 transform transition-all duration-300">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection