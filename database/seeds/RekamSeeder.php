<?php

namespace Database\Seeders;

use DateTime;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RekamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Factory::create('id_ID');

        DB::table('rekams')->insert([
            'no_rm' => '1',
            'nama' => 'Yuniawan Dedi Sutrisno',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1983-06-03',
            'dusun' => 'Ngebrak Barat',
            'rt' => '3',
            'rw' => '28',
            'desa' => 'Semanu',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '2',
            'nama' => 'Sujiman',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1979-12-27',
            'dusun' => 'Gunung Krambil',
            'rt' => '7',
            'rw' => '1',
            'desa' => 'Ngeposari',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '3',
            'nama' => 'Satiyar',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1951-12-31',
            'dusun' => 'Bolodukuh Lor',
            'rt' => '1',
            'rw' => '6',
            'desa' => 'Sidorejo',
            'kecamatan' => 'Ponjong',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '4',
            'nama' => 'Sugiran',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1970-05-10',
            'dusun' => 'Kalangbangi Lor',
            'rt' => '1',
            'rw' => '3',
            'desa' => 'Ngeposari',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '5',
            'nama' => 'Marsito Rukino',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1940-10-09',
            'dusun' => 'Petir B',
            'rt' => '4',
            'rw' => '2',
            'desa' => 'Petir',
            'kecamatan' => 'Rongkop',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '6',
            'nama' => 'Sanem',
            'kelamin' => 'perempuan',
            'tgl_lahir' => '1950-05-11',
            'dusun' => 'Dengok',
            'rt' => '1',
            'rw' => '10',
            'desa' => 'Pucanganom',
            'kecamatan' => 'Rongkop',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '7',
            'nama' => 'Eksan Pebrianto',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1990-08-16',
            'dusun' => 'Sempon',
            'rt' => '1',
            'rw' => '10',
            'desa' => 'Dadapayu',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '8',
            'nama' => 'Anik Purwanti',
            'kelamin' => 'perempuan',
            'tgl_lahir' => '1980-01-15',
            'dusun' => 'Kalangbangi Lor',
            'rt' => '2',
            'rw' => '3',
            'desa' => 'Ngeposari',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('rekams')->insert([
            'no_rm' => '9',
            'nama' => 'Akbar Pradita Ramadan',
            'kelamin' => 'laki-laki',
            'tgl_lahir' => '1987-07-20',
            'dusun' => 'Keblak',
            'rt' => '2',
            'rw' => '13',
            'desa' => 'Ngeposari',
            'kecamatan' => 'Semanu',
            'kota_kab' => 'Gunung Kidul',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // DB::table('rekams')->insert([
        //     'no_rm' => '10',
        //     'nama' => 'Sulastri',
        //     'kelamin' => 'perempuan',
        //     'tgl_lahir' => '1997-06-10',
        //     'dusun' => 'Pomahan',
        //     'rt' => '2',
        //     'rw' => '7',
        //     'desa' => 'Ngeposari',
        //     'kecamatan' => 'Semanu',
        //     'kota_kab' => 'Gunung Kidul',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        for ($i = 0; $i < 90; $i++) {
            DB::table('rekams')->insert([
                'no_rm' => $faker->unique()->randomNumber(2, true),
                'nama' => $faker->name(),
                'kelamin' => $faker->randomElement(['perempuan', 'laki-laki']),
                'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dusun' => $faker->randomElement(['Pomahan', 'Turi', 'Sempon', 'Watu Mengkurep', 'Kalangbangi Lor']),
                'rt' => $faker->numberBetween(0, 20),
                'rw' => $faker->numberBetween(0, 20),
                'desa' => $faker->randomElement(['Ngeposari', 'Semanu', 'Sidorejo', 'Dadap Ayu', 'Petir']),
                'kecamatan' => $faker->randomElement(['Ponjong', 'Semanu', 'Rongkop']),
                'kota_kab' => 'Gunung Kidul',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

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
