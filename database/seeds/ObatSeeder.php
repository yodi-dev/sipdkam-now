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

        DB::table('obats')->insert([
            'nama_obat' => 'aspirin',
            'harga_obat' => 2000,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('obats')->insert([
            'nama_obat' => 'Betadine',
            'harga_obat' => 2000,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('obats')->insert([
            'nama_obat' => 'Biotin',
            'harga_obat' => 1000,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('obats')->insert([
            'nama_obat' => 'Decolgen',
            'harga_obat' => 3000,
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
