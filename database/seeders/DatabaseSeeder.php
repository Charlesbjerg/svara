<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Call seeder classes
        $this->call([
            ProjectStateSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            UserSeeder::class,
        ]);

    }
}
