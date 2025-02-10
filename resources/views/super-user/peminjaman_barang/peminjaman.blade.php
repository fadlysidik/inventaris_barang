@extends('layout.su')

@section('content')
    <main class="p-10 bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 min-h-screen">
        <div class="container mx-auto py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text">
                    📌 Daftar Peminjaman
                </h1>

                <!-- Tombol Modal -->
                <button id="openModalBtn"
                    class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-8 py-3 rounded-lg shadow-md 
                    hover:bg-gradient-to-l transform hover:scale-110 transition duration-300 ease-in-out">
                    ➕ Form Peminjaman
                </button>
            </div>

            <!-- Daftar Peminjaman -->
            <div id="daftarPeminjaman" 
                class="bg-white/60 backdrop-blur-lg shadow-2xl rounded-3xl p-8 mb-8 border border-white/30 transform 
                hover:scale-105 transition duration-300">
                <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">📅 Tanggal</th>
                            <th class="px-6 py-4 text-left">🎓 No Siswa</th>
                            <th class="px-6 py-4 text-left">👤 Nama</th>
                            <th class="px-6 py-4 text-left">📦 Barang</th>
                            <th class="px-6 py-4 text-left">🔙 Harus Kembali</th>
                            <th class="px-6 py-4 text-left">📌 Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $pinjam)
                            @foreach ($pinjam->peminjamanBarang as $barangPinjam)
                                <tr class="border-b hover:bg-indigo-50 transition duration-300">
                                    <td class="px-6 py-4">{{ $pinjam->pb_tgl->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->siswa->no_siswa }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4">{{ $barangPinjam->barangInventaris->br_nama }}</td>
                                    <td class="px-6 py-4">{{ $pinjam->pb_harus_kembali_tgl->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if ($pinjam->pb_stat == '1')
                                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-lg font-semibold">✅ Aktif</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-lg font-semibold">✔️ Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Form Peminjaman -->
            <div id="modalForm" 
                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden transition-opacity duration-300">
                <div class="bg-white/70 backdrop-blur-md rounded-xl shadow-xl w-full max-w-lg p-8 relative transform transition-all 
                    duration-500 scale-90 hover:scale-100 border border-white/30">
                    <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl">
                        ✕
                    </button>

                    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">📋 Form Peminjaman</h2>

                    <form action="{{ route('superuser.simpanPeminjamanBarang') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="siswa_id" class="block text-lg font-semibold text-gray-700">👩‍🎓 Nama Siswa</label>
                            <select name="siswa_id" id="siswa_id"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-100">
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->siswa_id }}">{{ $item->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="br_kode" class="block text-lg font-semibold text-gray-700">📦 Barang</label>
                            <select name="br_kode" id="br_kode"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-100">
                                @foreach ($barang as $item)
                                    <option value="{{ $item->br_kode }}">{{ $item->br_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="pb_tgl" class="block text-lg font-semibold text-gray-700">📅 Tanggal</label>
                            <input type="date" name="pb_tgl" id="pb_tgl"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-100" required>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-8 py-3 rounded-full shadow-md 
                                hover:bg-gradient-to-l transform hover:scale-110 transition duration-300 ease-in-out">
                                ✅ Pinjam Barang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalForm = document.getElementById('modalForm');

        openModalBtn.addEventListener('click', () => {
            modalForm.classList.remove('hidden');
            modalForm.classList.add('opacity-100');
        });

        closeModalBtn.addEventListener('click', () => {
            modalForm.classList.add('hidden');
            modalForm.classList.remove('opacity-100');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modalForm) {
                modalForm.classList.add('hidden');
                modalForm.classList.remove('opacity-100');
            }
        });
    </script>
@endsection
