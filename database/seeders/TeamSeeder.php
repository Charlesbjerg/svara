<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Only need two teams for now, no need for a factory
        DB::table('teams')->insert([
            ['name' => 'Development'],
            ['name' => 'Marketing']
        ]);
    }
}
