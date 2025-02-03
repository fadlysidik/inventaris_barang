@extends('layout.SU')

@section('content')
<style>
/* General Reset */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f9fafb; /* Light gray */
    color: #333;
}

/* Main Container */
main {
    padding: 20px;
}

/* Section Title */
h1, h2 {
    font-weight: 700;
    color: #2d3748; /* Gray 800 */
    margin-bottom: 16px;
}

h2 {
    font-size: 1.5rem;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

thead th {
    background: #4a5568; /* Gray 700 */
    color: #fff;
    padding: 12px;
    text-align: left;
    font-size: 0.875rem;
    font-weight: 600;
}

tbody td {
    padding: 12px;
    font-size: 0.875rem;
    color: #4a5568;
}

tbody tr {
    border-bottom: 1px solid #e2e8f0; /* Light gray */
}

tbody tr:hover {
    background: #edf2f7; /* Light blue */
    transition: background-color 0.3s ease-in-out;
}

/* Buttons */
button, a {
    display: inline-block;
    padding: 10px 16px;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: 6px;
    color: white;
    background-color: #3182ce; /* Blue 600 */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

button:hover, a:hover {
    background-color: #2b6cb0; /* Blue 700 */
}

/* Modal Styles */
#modalForm {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

#modalForm.active {
    visibility: visible;
    opacity: 1;
}

#modalForm .modal-content {
    background: white;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 500px;
    position: relative;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

#closeModalBtn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: transparent;
    border: none;
    font-size: 1.5rem;
    color: #4a5568; /* Gray 700 */
    cursor: pointer;
}

#closeModalBtn:hover {
    color: #2d3748; /* Gray 800 */
}

/* Input Fields */
input, select {
    width: 100%;
    padding: 10px;
    font-size: 0.875rem;
    color: #4a5568;
    border: 1px solid #cbd5e0; /* Light gray */
    border-radius: 6px;
    margin-bottom: 16px;
    transition: border-color 0.3s;
}

input:focus, select:focus {
    border-color: #3182ce; /* Blue 600 */
    outline: none;
    box-shadow: 0 0 4px rgba(49, 130, 206, 0.5);
}
</style>

<main>
    <h2>Daftar Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal Peminjaman</th>
                <th>No Siswa</th>
                <th>Nama Siswa</th>
                <th>Nama Barang</th>
                <th>Harus Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
                @foreach ($pinjam->peminjamanBarang as $barangPinjam)
                    <tr>
                        <td>{{ $pinjam->pb_tgl->format('d-m-Y') }}</td>
                        <td>{{ $pinjam->siswa->no_siswa }}</td>
                        <td>{{ $pinjam->siswa->nama_siswa }}</td>
                        <td>{{ $barangPinjam->barangInventaris->br_nama }}</td>
                        <td>{{ $pinjam->pb_harus_kembali_tgl->format('d-m-Y') }}</td>
                        <td>
                            @if ($pinjam->pb_stat == '01')
                                <span style="color: green; font-weight: bold;">Aktif</span>
                            @else
                                <span style="color: gray; font-weight: bold;">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <button id="openModalBtn">Form Peminjaman</button>

    <div id="modalForm">
        <div class="modal-content">
            <button id="closeModalBtn">&times;</button>
            <h2>Form Peminjaman Barang</h2>
            <form action="{{ route('superuser.simpanPeminjamanBarang') }}" method="POST">
                @csrf
                <div>
                    <label for="siswa_id">Nama Siswa</label>
                    <select name="siswa_id" id="siswa_id">
                        @foreach ($siswa as $item)
                            <option value="{{ $item->siswa_id }}">{{ $item->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="br_kode">Barang</label>
                    <select name="br_kode" id="br_kode">
                        @foreach ($barang as $item)
                            <option value="{{ $item->br_kode }}">{{ $item->br_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="pb_tgl">Tanggal Peminjaman</label>
                    <input type="date" name="pb_tgl" id="pb_tgl" required>
                </div>
                <button type="submit">Pinjam Barang</button>
            </form>
        </div>
    </div>
</main>

<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalForm = document.getElementById('modalForm');

    openModalBtn.addEventListener('click', () => {
        modalForm.classList.add('active');
    });

    closeModalBtn.addEventListener('click', () => {
        modalForm.classList.remove('active');
    });

    window.addEventListener('click', (e) => {
        if (e.target === modalForm) {
            modalForm.classList.remove('active');
        }
    });
</script>
@endsection
