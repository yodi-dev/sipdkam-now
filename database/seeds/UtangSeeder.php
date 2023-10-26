<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UtangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utangs')->insert([
            'tanggal' => '2023-10-10',
            'nama' => 'Diaz',
            'utang' => 100000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
