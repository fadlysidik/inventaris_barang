@extends('layout.su')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-indigo-700 text-center mb-6">Edit Pengguna</h2>

    <form action="{{ route('superuser.daftarPengguna.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="user_nama" value="{{ $user->user_nama }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
        </div>

        <!-- Hak Akses -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Hak Akses</label>
            <select name="user_hak" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                <option value="admin" {{ $user->user_hak == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->user_hak == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="user_sts" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                <option value="1" {{ $user->user_sts == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $user->user_sts == 0 ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('superuser.daftarPengguna.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-500">
                🔙 Kembali
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700">
                💾 Update
            </button>
        </div>
    </form>
</div>
@endsection
