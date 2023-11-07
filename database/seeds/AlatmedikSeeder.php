<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatmedikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alatmediks')->insert([
            'nama' => 'jarum suntik',
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('alatmediks')->insert([
            'nama' => 'termometer',
            'stok' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('alatmediks')->insert([
            'nama' => 'tensimeter',
            'stok' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
