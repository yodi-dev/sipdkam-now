<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Arr;
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
        $faker = Factory::create('id_ID');

        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '1',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '2',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '3',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '4',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '5',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '6',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '7',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('kunjungans')->insert([
            'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
            'shift' => $faker->randomElement([1, 2, 3]),
            'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
            'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
            'rekam_id' => '8',
            'dokter_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($i = 0; $i < 100; $i++) {
            DB::table('kunjungans')->insert([
                'tanggal' => $faker->dateTimeBetween('-1 month', '+1 days'),
                'shift' => $faker->randomElement([1, 2, 3]),
                'jaminan' => $faker->randomElement(['bpjs', 'reguler']),
                'poli' => $faker->randomElement(['umum', 'gigi', 'kb', 'home care', 'observasi']),
                'rekam_id' => $faker->randomNumber(2, true),
                'dokter_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '1',
        //     'jaminan' => 'bpjs',
        //     'poli' => 'umum',
        //     'rekam_id' => '3',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '2',
        //     'jaminan' => 'bpjs',
        //     'poli' => 'gigi',
        //     'rekam_id' => '2',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '2',
        //     'jaminan' => 'bpjs',
        //     'poli' => 'home care',
        //     'rekam_id' => '5',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '1',
        //     'jaminan' => 'regular',
        //     'poli' => 'umum',
        //     'rekam_id' => '4',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '3',
        //     'jaminan' => 'regular',
        //     'poli' => 'umum',
        //     'rekam_id' => '5',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '2',
        //     'jaminan' => 'regular',
        //     'poli' => 'gigi',
        //     'rekam_id' => '6',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '3',
        //     'jaminan' => 'regular',
        //     'poli' => 'home care',
        //     'rekam_id' => '7',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('kunjungans')->insert([
        //     'tanggal' => now(),
        //     'shift' => '3',
        //     'jaminan' => 'regular',
        //     'poli' => 'home care',
        //     'rekam_id' => '8',
        //     'dokter_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
