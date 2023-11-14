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
            'tanggal' => now(),
            'shift' => '1',
            'jaminan' => 'bpjs',
            'poli' => 'gigi',
            'rekam_id' => '1',
            'dokter_id' => '3',
            'sis' => 'tes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => now(),
            'shift' => '1',
            'jaminan' => 'bpjs',
            'poli' => 'kb',
            'rekam_id' => '1',
            'dokter_id' => '3',
            'sis' => 'tes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => now(),
            'shift' => '1',
            'jaminan' => 'regular',
            'poli' => 'gigi',
            'rekam_id' => '1',
            'dokter_id' => '3',
            'sis' => 'tes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => now(),
            'shift' => '1',
            'jaminan' => 'regular',
            'poli' => 'kb',
            'rekam_id' => '1',
            'dokter_id' => '3',
            'sis' => 'tes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
