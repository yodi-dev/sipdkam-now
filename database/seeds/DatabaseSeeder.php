<?php

use Database\Seeders\AlatmedisSeeder;
use Database\Seeders\DokterSeeder;
use Database\Seeders\KunjunganSeeder;
use Database\Seeders\ObatSeeder;
use Database\Seeders\RekamSeeder;
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
        DB::table('alatmedis')->truncate();

        $this->call([RolesTableSeeder::class, UsersTableSeeder::class]);
        $this->call([RekamSeeder::class, KunjunganSeeder::class]);
        $this->call([ObatSeeder::class, AlatmedisSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
