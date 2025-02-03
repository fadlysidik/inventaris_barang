@extends('layout.SU')

@section('content')
<style>
    /* General Reset */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f3f4f6;
    color: #333;
}

/* Container */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 16px;
    background: linear-gradient(to right, #ebf8ff, #e0e7ff);
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Title Styles */
h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 16px;
    color: #374151; /* Gray 800 */
    text-align: center;
}

/* Form Styling */
form {
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

form:hover {
    transform: scale(1.05);
}

/* Form Elements */
label {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #4a5568; /* Gray 700 */
}

input, select {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    border: 1px solid #d2d6dc; /* Gray 300 */
    border-radius: 8px;
    margin-bottom: 16px;
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    border-color: #6366f1; /* Indigo 500 */
    outline: none;
    box-shadow: 0 0 4px rgba(99, 102, 241, 0.5);
}

/* Button Styles */
button {
    display: inline-block;
    background: linear-gradient(to right, #6366f1, #3b82f6);
    color: white;
    font-size: 1rem;
    font-weight: 600;
    padding: 12px 24px;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border: none;
}

button:hover {
    background: linear-gradient(to left, #6366f1, #3b82f6);
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 16px;
    }

    h2 {
        font-size: 1.5rem;
    }

    button {
        font-size: 0.9rem;
        padding: 10px 20px;
    }
}

</style>
    <div class="container mx-auto p-8 bg-gradient-to-r from-blue-100 to-indigo-200 shadow-lg rounded-lg">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Form Pengembalian Barang</h2>
        <form action="{{ route('superuser.pengembalianBarang.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow-md transform transition-all hover:scale-105 duration-300">
            @csrf
            <!-- Pilih Peminjaman -->
            <div class="flex flex-col">
                <label for="pb_id" class="text-lg font-semibold text-gray-700 mb-2">Pilih Peminjaman</label>
                <select name="pb_id" id="pb_id" class="border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-600 transition duration-300" required>
                    <option value="">-- Pilih Peminjaman --</option>
                    @foreach ($peminjaman as $item)
                        <option value="{{ $item->pb_id }}">
                            {{ $item->siswa->nama_siswa }} -
                            {{ $item->peminjamanBarang[0]->barangInventaris->br_nama ?? 'Barang Tidak Ditemukan' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Pengembalian -->
            <div class="flex flex-col">
                <label for="kembali_tgl" class="text-lg font-semibold text-gray-700 mb-2">Tanggal Pengembalian</label>
                <input type="date" name="kembali_tgl" id="kembali_tgl" class="border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-600 transition duration-300" required>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-gradient-to-l transition duration-300 ease-in-out">
                    Simpan Pengembalian
                </button>
            </div>
        </form>
    </div>
@endsection
