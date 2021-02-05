<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Manually add each project state
        $states = [
            ['state' => 'Sales Lead'],
            ['state' => 'Awaiting Sign Off'],
            ['state' => 'To Be Scheduled'],
            ['state' => 'Scheduled'],
            ['state' => 'In Progress'],
            ['state' => 'Beta'],
            ['state' => 'Awaiting Testing'],
            ['state' => 'Awaiting Deployment'],
            ['state' => 'Ongoing'],
            ['state' => 'Complete'],
        ];
        DB::table('project_states')->insert($states);

    }
}
