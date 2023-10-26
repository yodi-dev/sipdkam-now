<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AlatmedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alatmedis')->insert([
            'nama' => 'jarum suntik',
            'stok' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('alatmedis')->insert([
            'nama' => 'termometer',
            'stok' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('alatmedis')->insert([
            'nama' => 'tensimeter',
            'stok' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
