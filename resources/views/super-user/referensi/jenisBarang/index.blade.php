@extends('layout.su')

@section('content')
<div class="container mx-auto p-6">
    <!-- Flash Message -->
    @if(session('success'))
    <div id="alert" class="mb-4 flex items-center justify-between bg-green-500 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md">
        <span>✅ {{ session('success') }}</span>
        <button onclick="document.getElementById('alert').style.display='none'" class="text-xl font-bold">&times;</button>
    </div>
    @endif

    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text drop-shadow-lg">
            📦 Kelola Jenis Barang
        </h2>
    </div>

    <!-- Form Tambah Jenis Barang (Kecil di atas) -->
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-lg mx-auto mb-8 transform transition-all duration-300 hover:scale-105">
        <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">➕ Tambah Jenis Barang</h3>
        <form action="{{ route('superuser.jenisBarang.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="jns_brg_kode" class="block text-sm font-medium text-gray-700">Kode Jenis Barang</label>
                <input type="text" name="jns_brg_kode" id="jns_brg_kode" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
            </div>
            <div>
                <label for="jns_brg_nama" class="block text-sm font-medium text-gray-700">Nama Jenis Barang</label>
                <input type="text" name="jns_brg_nama" id="jns_brg_nama" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm">
            </div>
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-red-500 to-gray-500 text-white text-lg font-semibold rounded-lg shadow-md hover:opacity-90 transform transition-all duration-300">
                💾 Simpan
            </button>
        </form>
    </div>

    <!-- Daftar Jenis Barang (Tabel di bawah) -->
    <div class="overflow-hidden rounded-lg border border-gray-200 transition-all duration-300 hover:shadow-2xl hover:scale-105">
        <table class="w-full bg-white text-gray-700">
            <thead class="bg-gradient-to-r from-gray-500 to-red-500 text-white">
                <tr>
                    <th class="py-4 px-6 text-left text-lg font-semibold">ID</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold">Nama Jenis Barang</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($jenisBarang as $item)
                <tr class="hover:bg-gray-100 transition-all duration-300">
                    <td class="py-4 px-6 text-md font-medium">{{ $item->jns_brg_kode }}</td>
                    <td class="py-4 px-6 text-md">{{ $item->jns_brg_nama }}</td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('superuser.jenisBarang.edit', $item->jns_brg_kode) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition-transform transform hover:scale-110">
                            ✏️ Edit
                        </a>
                        <button onclick="confirmDelete('{{ route('superuser.jenisBarang.destroy', $item->jns_brg_kode) }}')"
                                class="bg-red-500 text-white px-4 py-2 rounded-full shadow-md hover:bg-red-600 transition-transform transform hover:scale-110">
                            🗑️ Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Jenis barang ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.action = deleteUrl;
                form.method = 'POST';
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
