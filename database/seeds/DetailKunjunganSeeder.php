<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_kunjungans')->insert([
            'shift' => '1',
            'jaminan' => 'regular',
            'poli' => 'umum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
