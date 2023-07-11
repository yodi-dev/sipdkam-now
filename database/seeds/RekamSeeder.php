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
            'no_rm' => '0000001',
            'nama' => 'Wibowo',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Simpang',
            'kecamatan' => 'Singkut',
            'kota_kab' => 'Sarolangun',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000002',
            'nama' => 'Putri',
            'kelamin' => 'perempuan',
            'tgl_lahir' => '2000-10-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Ranting',
            'kecamatan' => 'Bangunharjo',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000003',
            'nama' => 'Aldi',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000004',
            'nama' => 'Aldian',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000005',
            'nama' => 'Rizky',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000006',
            'nama' => 'Aldi taher',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000007',
            'nama' => 'Aji',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000008',
            'nama' => 'Putra',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000009',
            'nama' => 'ratna',
            'kelamin' => 'perempuan',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '0000010',
            'nama' => 'Sulastri',
            'kelamin' => 'perempuan',
            'tgl_lahir' => '2000-03-10',
            'dusun' => '1',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Penari',
            'kecamatan' => 'kentana',
            'kota_kab' => 'Gunung',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // DB::table('rekams')->insert([
        //     'no_rm' => '2212',
        //     'nama' => 'roso',
        //     'kelamin' => 'laki-laki',
        //     'tgl_lahir' => '2000-10-10',
        //     'dusun' => '1',
        //     'rt' => '2',
        //     'rw' => '3',
        //     'desa' => 'gatau',
        //     'kecamatan' => 'gajuga',
        //     'kota_kab' => 'apalagi',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('rekams')->insert([
        //     'no_rm' => '33254',
        //     'nama' => 'tono',
        //     'kelamin' => 'laki-laki',
        //     'tgl_lahir' => '2000-10-10',
        //     'dusun' => '1',
        //     'rt' => '2',
        //     'rw' => '3',
        //     'desa' => 'gatau',
        //     'kecamatan' => 'gajuga',
        //     'kota_kab' => 'apalagi',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
