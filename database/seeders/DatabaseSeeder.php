<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PermissionTableSeeder::class,
            KategoriSeeder::class,
            CreateAdminUserSeeder::class,
            KonfigurasiSeeder::class,
        ]);
    }
}
