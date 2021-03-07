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

        /**
         * UserSeeder MUST run last as it depends on data provided
         * by the other seeder classes.
         */
        $this->call([
            ProjectStateSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            PipelineEntitySeeder::class,
        ]);

    }
}
