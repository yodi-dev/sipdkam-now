<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kunjungans')->insert([
            'shift' => '1',
            'jaminan' => 'regular',
            'poli' => 'umum',
            'rekam_id' => '5',
            'dokter_id' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
