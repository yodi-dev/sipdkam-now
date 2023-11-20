<?php

use Database\Seeders\AlatmedikSeeder;
use Database\Seeders\JadwalSeeder;
use Database\Seeders\KunjunganSeeder;
use Database\Seeders\ObatSeeder;
use Database\Seeders\RekamSeeder;
use Database\Seeders\UtangSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('rekams')->truncate();
        DB::table('kunjungans')->truncate();
        DB::table('obats')->truncate();
        DB::table('alatmediks')->truncate();
        DB::table('utangs')->truncate();
        DB::table('jadwals')->truncate();

        $this->call([RolesTableSeeder::class, UsersTableSeeder::class]);
        $this->call([RekamSeeder::class, KunjunganSeeder::class]);
        $this->call([ObatSeeder::class, AlatmedikSeeder::class, UtangSeeder::class, JadwalSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
