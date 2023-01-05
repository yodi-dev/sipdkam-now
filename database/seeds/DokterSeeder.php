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
            'nama_dokter' => 'Dr. Anton',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'Dr. Bagus',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'Dr. Ana',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('dokters')->insert([
            'nama_dokter' => 'Dr. Ratna',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
