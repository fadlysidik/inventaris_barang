<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BarangInventarisController,
    PeminjamanBarangController,
    AuthController,
    SuperUserController,
    LaporanBarangController,
    PengembalianController,
    ReferensiController,
    UserController
};

// Rute untuk login dan autentikasi
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute dengan proteksi middleware auth
Route::prefix('super-user')->name('superuser.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [SuperUserController::class, 'jumlahBarang'])->name('dashboard');

    // Barang Inventaris
    Route::get('/daftar-barang', [BarangInventarisController::class, 'DBarang'])->name('daftarBarang');
    Route::get('/penerimaan-barang', [BarangInventarisController::class, 'PBarang'])->name('penerimaanBarang');
    Route::post('/penerimaan-barang/store', [BarangInventarisController::class, 'barangStore'])->name('barangStore');

    // Peminjaman Barang
    Route::get('/peminjaman-barang', [PeminjamanBarangController::class, 'peminjamanBarang'])->name('peminjamanBarang');
    Route::post('/peminjaman-barang/store', [PeminjamanBarangController::class, 'simpanPeminjamanBarang'])->name('simpanPeminjamanBarang');

    // Pengembalian Barang
    Route::get('/pengembalian-barang', [PengembalianController::class, 'formPengembalian'])->name('pengembalianBarang');
    Route::post('/pengembalian-barang/store', [PengembalianController::class, 'simpanPengembalian'])->name('pengembalianBarang.store');
    // Laporan
    Route::get('/laporan-barang', [LaporanBarangController::class, 'laporanBarang'])->name('laporanBarang');
    Route::get('/laporan-peminjaman', [LaporanBarangController::class, 'laporanPeminjaman'])->name('laporanPeminjaman');

    // Jenis Barang
    Route::prefix('jenis-barang')->name('jenisBarang.')->group(function () {
        Route::get('/', [ReferensiController::class, 'index'])->name('index');
        Route::get('/create', [ReferensiController::class, 'create'])->name('create');
        Route::post('/store', [ReferensiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ReferensiController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ReferensiController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ReferensiController::class, 'destroy'])->name('destroy');
    });

    // daftar pengguna
    Route::get('/daftarPengguna', [UserController::class, 'index'])->name('daftarPengguna.index'); // Menampilkan daftar pengguna
    Route::get('/daftarPengguna/create', [UserController::class, 'create'])->name('daftarPengguna.create'); // Halaman tambah pengguna
    Route::post('/daftarPengguna/store', [UserController::class, 'store'])->name('daftarPengguna.store'); // Menyimpan data pengguna baru
    Route::get('/daftarPengguna/edit/{user_id}', [UserController::class, 'edit'])->name('daftarPengguna.edit'); // Halaman edit pengguna
    Route::put('/daftarPengguna/update/{user_id}', [UserController::class, 'update'])->name('daftarPengguna.update'); // Update data pengguna
    Route::delete('/daftarPengguna/destroy/{user_id}', [UserController::class, 'destroy'])->name('daftarPengguna.destroy'); // Hapus pengguna
});
