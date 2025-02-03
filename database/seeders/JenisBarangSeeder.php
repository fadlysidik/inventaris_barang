<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tr_jenis_barang')->insert([
            [
                'jns_brg_kode' => 'BRG01',
                'jns_brg_nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jns_brg_kode' => 'BRG02',
                'jns_brg_nama' => 'Perabotan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jns_brg_kode' => 'BRG03',
                'jns_brg_nama' => 'Kendaraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jns_brg_kode' => 'BRG04',
                'jns_brg_nama' => 'Alat Tulis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jns_brg_kode' => 'BRG05',
                'jns_brg_nama' => 'Furnitur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
