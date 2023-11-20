<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwals')->insert([
            'tanggal' => '2023-11-20',
            'bagian' => 'petugas',
            'shift' => '1',
            'nama' => 'Diaz',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
