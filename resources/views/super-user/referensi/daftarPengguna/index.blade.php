@extends('layout.su')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Flash Message -->
    @if(session('success'))
    <div id="alert" class="mb-4 flex items-center justify-between bg-green-500 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md">
        <span>✅ {{ session('success') }}</span>
        <button onclick="document.getElementById('alert').style.display='none'" class="text-xl font-bold">&times;</button>
    </div>
    @endif

    <!-- Header & Tambah Pengguna Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-4xl font-bold text-black-700">Daftar Pengguna</h2>
        <button onclick="openModal()" class="bg-gradient-to-r from-red-500 to-gray-500 text-white px-6 py-3 rounded-full shadow-lg hover:scale-105 transition">
            + Tambah Pengguna
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg hover:shadow-2xl transition-all">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-500 to-red-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-left text-lg font-semibold">ID</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Nama</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Hak Akses</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Status</th>
                    <th class="py-4 px-6 text-center text-lg font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-100 transition-all">
                    <td class="py-4 px-6">{{ $user->user_id }}</td>
                    <td class="py-4 px-6">{{ $user->user_nama }}</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 text-sm font-medium bg-blue-500 text-white rounded-full">
                            {{ ucfirst($user->user_hak) }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $user->user_sts ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ $user->user_sts ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <button onclick="editUser({{ $user }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition">
                            ✏️ Edit
                        </button>
                        <button onclick="confirmDelete('{{ route('superuser.daftarPengguna.destroy', $user->user_id) }}')"
                            class="bg-red-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-600 transition">
                            🗑️ Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Form Tambah/Edit Pengguna -->
<div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 id="modalTitle" class="text-3xl font-bold text-black-700 text-center mb-6">Tambah Pengguna</h2>

        <form id="userForm" action="{{ route('superuser.daftarPengguna.store') }}" method="POST">
            @csrf
            <input type="hidden" id="userId" name="user_id">

            <div class="mb-4">
                <label for="user_nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" name="user_nama" id="user_nama" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
            </div>

            <div class="mb-4">
                <label for="user_hak" class="block text-gray-700 font-semibold mb-2">Hak Akses</label>
                <select name="user_hak" id="user_hak" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="user_sts" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="user_sts" id="user_sts" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-500">🔙 Batal</button>
                <button type="submit" id="modalSubmit" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700">✅ Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 & JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function openModal() {
        document.getElementById("modalTitle").innerText = "Tambah Pengguna";
        document.getElementById("userForm").action = "{{ route('superuser.daftarPengguna.store') }}";
        document.getElementById("userForm").reset();
        document.getElementById("userModal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("userModal").classList.add("hidden");
    }

    function editUser(user) {
        document.getElementById("modalTitle").innerText = "Edit Pengguna";
        document.getElementById("userForm").action = `/superuser/daftarPengguna/${user.user_id}`;
        document.getElementById("userId").value = user.user_id;
        document.getElementById("user_nama").value = user.user_nama;
        document.getElementById("user_hak").value = user.user_hak;
        document.getElementById("user_sts").value = user.user_sts;
        document.getElementById("userModal").classList.remove("hidden");
    }

    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Pengguna ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }
</script>
@endsection
