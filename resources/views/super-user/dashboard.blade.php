@extends('layout.SU')

@section('content')
<div class="p-4">
    <h3 class="text-lg font-bold text-indigo-800 mb-4 text-center">Dashboard</h3>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6">
    <!-- Total Barang -->
    <div class="bg-white p-6 shadow-lg rounded-2xl flex flex-col items-center">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Jumlah Barang</h3>
        <p class="text-4xl font-bold text-indigo-600">15</p>
    </div>

    <!-- Total Peminjaman -->
    <div class="bg-white p-6 shadow-lg rounded-2xl flex flex-col items-center">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Jumlah Peminjaman</h3>
        <p class="text-4xl font-bold text-indigo-600">3</p>
    </div>
</div>

@endsection
