<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // **Matikan sementara foreign key constraint**
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // **Hapus data tanpa truncate untuk menghindari error foreign key**
        DB::table('tm_user')->delete();

        // **Aktifkan kembali foreign key constraint**
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Tambahkan user tanpa duplikasi
        DB::table('tm_user')->updateOrInsert(
            ['user_id' => 1],
            [
                'user_nama' => 'Super User',
                'user_pass' => Hash::make('password'),
                'user_hak' => 'SU',
                'user_sts' => 1,
            ]
        );

        DB::table('tm_user')->updateOrInsert(
            ['user_id' => 2],
            [
                'user_nama' => 'Admin',
                'user_pass' => Hash::make('password'),
                'user_hak' => 'admin',
                'user_sts' => 1,
            ]
        );
    }
}
