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
            [
                'name' => 'Project Sign-off', 
                'component_name' => 'project-sign-off', 
                'icon_large' => 'sign-off',
                'icon_small' => 'fa-file-signature', 
                'description' => 'Adding a sign off requires the phase to be signed off before the project can continue'
            ],
            [
                'name' => 'Documents', 
                'component_name' => 'documents',
                'icon_large' => 'documents',
                'icon_small' => 'fa-folder-open', 
                'description' => 'Adds a folder for file storage to this phase of the project',
            ],
            [
                'name' => 'Boards', 
                'component_name' => 'boards',
                'icon_large' => 'boards',
                'icon_small' => 'fa-columns', 
                'description' => 'Adds a set of fully customisable kanban style boards to the phase'
            ],
            [
                'name' => 'Checklists', 
                'component_name' => 'checklists',
                'icon_large' => 'checklist',
                'icon_small' => 'fa-clipboard-list', 
                'description' => 'Adds a simple checklist to the phase',
            ],
        ]);
    }
}
