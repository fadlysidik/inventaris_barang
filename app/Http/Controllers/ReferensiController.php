<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Http\Request;

class ReferensiController extends Controller
{
    /**
     * Menampilkan daftar jenis barang.
     */
    public function index()
    {
        $jenisBarang = JenisBarang::all();
        $users = User::all();
        return view('super-user.referensi.jenisBarang.index', compact('jenisBarang','users'));
    }

    /**
     * Menampilkan form tambah jenis barang.
     */
    public function create()
    {
        return view('super-user.referensi.jenisBarang.create');
    }

    /**
     * Menyimpan jenis barang baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jns_brg_kode' => 'required|unique:tr_jenis_barang|max:10',
            'jns_brg_nama' => 'required|max:255',
        ]);

        JenisBarang::create([
            'jns_brg_kode' => $request->jns_brg_kode,
            'jns_brg_nama' => $request->jns_brg_nama,
        ]);

        return redirect()->route('superuser.jenisBarang.index')->with('success', 'Jenis Barang berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit jenis barang.
     */
    public function edit($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('super-user.referensi.jenisBarang.edit', compact('jenisBarang'));
    }

    /**
     * Menyimpan perubahan pada jenis barang.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jns_brg_nama' => 'required|max:255',
        ]);

        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->update([
            'jns_brg_nama' => $request->jns_brg_nama,
        ]);

        return redirect()->route('superuser.jenisBarang.index')->with('success', 'Jenis Barang berhasil diperbarui!');
    }

    /**
     * Menghapus jenis barang dari database.
     */
    public function destroy($id)
    {
        JenisBarang::findOrFail($id)->delete();
        return redirect()->route('superuser.jenisBarang.index')->with('success', 'Jenis Barang berhasil dihapus!');
    }
}
