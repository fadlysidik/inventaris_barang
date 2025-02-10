@extends('layout.su')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-black-700 text-center mb-6">Tambah Pengguna</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('superuser.daftarPengguna.store') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="user_nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input 
                type="text" 
                name="user_nama" 
                id="user_nama"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" 
                required 
            >
            @error('user_nama') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="user_pass" class="block text-gray-700 font-semibold mb-2">Password</label>
            <input 
                type="password" 
                name="user_pass" 
                id="user_pass"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" 
                required 
            >
            @error('user_pass') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Hak Akses -->
        <div class="mb-4">
            <label for="user_hak" class="block text-gray-700 font-semibold mb-2">Hak Akses</label>
            <select 
                name="user_hak" 
                id="user_hak"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" 
                required
            >
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('user_hak') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="user_sts" class="block text-gray-700 font-semibold mb-2">Status</label>
            <select 
                name="user_sts" 
                id="user_sts"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" 
                required
            >
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
            @error('user_sts') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between">
            <a href="{{ route('superuser.daftarPengguna.index') }}" 
               class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-500">
                🔙 Kembali
            </a>
            <button type="submit" 
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700">
                ✅ Simpan
            </button>
        </div>
    </form>
</div>
@endsection
