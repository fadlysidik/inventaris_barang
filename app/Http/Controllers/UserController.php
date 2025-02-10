<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user.
     */
    public function index()
    {
        $users = User::all();
        return view('super-user.referensi.daftarPengguna.index', compact('users'));
    }

    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        return view('super-user.referensi.daftarPengguna.create');
    }

    /**
     * Menyimpan user baru ke database.
     */
    /**
     * Menyimpan user baru ke database dengan user_id otomatis.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_nama' => 'required|string|max:100',
            'user_pass' => 'required|string|min:6',
            'user_hak' => 'required|string|max:20',
            'user_sts' => 'required|boolean',
        ]);

        // Generate user_id otomatis
        $lastUser = User::orderBy('user_id', 'desc')->first();
        if ($lastUser) {
            $lastIdNumber = intval(substr($lastUser->user_id, 1)); // Ambil angka dari ID terakhir
            $newIdNumber = str_pad($lastIdNumber + 1, 3, '0', STR_PAD_LEFT); // Tambah 1 dan format 3 digit
        } else {
            $newIdNumber = '001'; // Jika belum ada user, mulai dari 001
        }
        $newUserId = 'U' . $newIdNumber; // Format ID baru, misalnya U001

        // Simpan user baru
        User::create([
            'user_id' => $newUserId,
            'user_nama' => $request->user_nama,
            'user_pass' => Hash::make($request->user_pass), // Enkripsi password
            'user_hak' => $request->user_hak,
            'user_sts' => $request->user_sts,
        ]);

        return redirect()->route('superuser.daftarPengguna.index')->with('success', 'User berhasil ditambahkan dengan ID: ' . $newUserId);
    }




    /**
     * Menampilkan form edit user.
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('super-user.referensi.daftarPengguna.edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'user_nama' => 'required|string|max:100',
            'user_hak' => 'required|string|max:20',
            'user_sts' => 'required|boolean',
        ]);

        $user = User::findOrFail($user_id);
        $user->update([
            'user_nama' => $request->user_nama,
            'user_hak' => $request->user_hak,
            'user_sts' => $request->user_sts,
        ]);

        if ($request->filled('user_pass')) {
            $user->update(['user_pass' => Hash::make($request->user_pass)]);
        }

        return redirect()->route('superuser.daftarPengguna.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy($user_id)
    {
        User::findOrFail($user_id)->delete();
        return redirect()->route('superuser.daftarPengguna.index')->with('success', 'User berhasil dihapus.');
    }
}
