<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PipelineEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Component must be kebab case */
        DB::table('pipeline_entities')->insert([
            ['name' => 'Project Sign-off', 'component_name' => 'project-sign-off'],
            ['name' => 'Documents', 'component_name' => 'documents'],
            ['name' => 'Boards', 'component_name' => 'boards'],
            ['name' => 'Checklists', 'component_name' => 'checklists'],
        ]);
    }
}
