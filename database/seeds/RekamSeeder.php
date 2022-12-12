<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekams')->insert([
            'no_rm' => '222',
            'nama' => 'rizku',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'gatau',
            'kecamatan' => 'gajuga',
            'kota_kab' => 'apalagi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '23',
            'nama' => 'rizku',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'gatau',
            'kecamatan' => 'gajuga',
            'kota_kab' => 'apalagi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '2222432',
            'nama' => 'rizku',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'gatau',
            'kecamatan' => 'gajuga',
            'kota_kab' => 'apalagi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '2212',
            'nama' => 'roso',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'gatau',
            'kecamatan' => 'gajuga',
            'kota_kab' => 'apalagi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '33254',
            'nama' => 'tono',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'gatau',
            'kecamatan' => 'gajuga',
            'kota_kab' => 'apalagi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
