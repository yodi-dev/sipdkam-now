<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obats')->insert([
            'nama_obat' => 'paracetamol',
            'harga_obat' => 1000,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
