<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // WAJIB TAMBAHKAN INI

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menginputkan data pada database sesuai standar Seeder [cite: 20]
        DB::table('data_mhs')->insert([
            'nim' => 'E41230001',
            'nama' => 'Sayfudin Hamdan',
            'prodi' => 'Teknik Komputer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}