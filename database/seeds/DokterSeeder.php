<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokters')->insert([
            'nama_dokter' => 'awann',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'uwun',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'ann',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'wann',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
