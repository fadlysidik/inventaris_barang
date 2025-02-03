@extends('layout.SU')

@section('content')
<style>
    /* General Reset */
body {
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

/* Container Styling */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 16px;
}

/* Gradient Background for Form Wrapper */
.bg-gradient-to-br {
    background: linear-gradient(to bottom right, #06b6d4, #3b82f6, #6366f1);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
    transition: transform 0.5s ease-in-out;
}

.bg-gradient-to-br:hover {
    transform: scale(1.05);
}

/* Form Title Styling */
h2 {
    font-family: 'Poppins', sans-serif;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Form Element Styles */
form {
    background-color: #fff;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.5s ease-in-out;
}

form:hover {
    transform: scale(1.05);
}

/* Labels */
label {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 8px;
    display: inline-block;
}

/* Input Fields */
input,
select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #d1d5db;
    border-radius: 12px;
    font-size: 1rem;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

input:focus,
select:focus {
    outline: none;
    border-color: #06b6d4;
    box-shadow: 0 0 8px rgba(6, 182, 212, 0.3);
}

/* Placeholder Text */
::placeholder {
    color: #9ca3af;
}

/* Submit Button */
button[type="submit"] {
    background: linear-gradient(to right, #06b6d4, #3b82f6);
    color: #fff;
    padding: 12px 24px;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out, background 0.3s ease-in-out;
}

button[type="submit"]:hover {
    background: linear-gradient(to left, #06b6d4, #3b82f6);
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    h2 {
        font-size: 1.5rem;
    }

    form {
        padding: 1.5rem;
    }

    button[type="submit"] {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
}

</style>
<div class="container mx-auto py-8 px-4">

    <!-- Form Penerimaan Barang -->
    <div class="bg-gradient-to-br from-cyan-600 via-blue-500 to-indigo-600 p-10 rounded-3xl shadow-2xl w-full mb-8 transform hover:scale-105 transition duration-500 ease-in-out">
        <h2 class="text-4xl font-extrabold mb-8 text-white text-center animate__animated animate__fadeInUp">Form Penerimaan Barang</h2>
        <form action="{{ route('superuser.barangStore') }}" method="POST"
            class="space-y-8 bg-white p-8 rounded-2xl shadow-lg transform hover:scale-105 transition duration-500 ease-in-out">
            @csrf
            <div class="space-y-4">
                <label for="nama" class="block text-gray-800 text-lg font-semibold">Nama Barang</label>
                <input type="text" id="nama" name="nama"
                    class="w-full border-2 border-gray-300 rounded-lg px-6 py-3 text-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 placeholder-gray-500 text-lg shadow-lg"
                    placeholder="Masukkan nama barang" required>
            </div>
            <div class="space-y-4">
                <label for="kategori" class="block text-gray-800 text-lg font-semibold">Kategori</label>
                <select id="kategori" name="kategori" required
                    class="w-full border-2 border-gray-300 rounded-lg px-6 py-3 text-gray-800 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-lg shadow-lg">
                    <option value="">Pilih Kategori</option>
                    @if (isset($jenisBarang) && $jenisBarang->count())
                        @foreach ($jenisBarang as $kategori)
                            <option value="{{ $kategori->jns_brg_kode }}">{{ $kategori->jns_brg_nama }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>Tidak ada kategori tersedia</option>
                    @endif
                </select>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-gradient-to-l transition duration-300 ease-in-out transform hover:scale-110">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
