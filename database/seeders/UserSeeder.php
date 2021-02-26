<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Team;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Manually add a user of each needed type
        $users = [
            [
                'name' => 'Charlie Underhill',
                'email' => 'charlie@charlesbjerg.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'job_role' => 'Frontend Developer',
                'created_at' => now(),
                'updated_at' => now(),
                'type_id' => 2,
            ],
            [
                'name' => 'Sophie Hibberd',
                'email' => 'sophie@svara.io',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'job_role' => 'Graphic Designer',
                'created_at' => now(),
                'updated_at' => now(),
                'type_id' => 0,
            ],
            [
                'name' => 'Sam Benge',
                'email' => 'sam@svara.io',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'job_role' => 'Lead Developer',
                'created_at' => now(),
                'updated_at' => now(),
                'type_id' => 1,
            ],
            [
                'name' => 'Ryan Hissey',
                'email' => 'ryan@svara.io',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'job_role' => 'Account Manager',
                'created_at' => now(),
                'updated_at' => now(),
                'type_id' => 1,
            ],
            [
                'name' => 'Steve Jobs',
                'email' => 'steve@apple.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'job_role' => 'CEO',
                'created_at' => now(),
                'updated_at' => now(),
                'type_id' => 3,
            ],
        ];
        DB::table('users')->insert($users);

        // Use factory to make 10 more random users
        \App\Models\User::factory(10)->create();

        $this->setupRelationalData();

    }

    /**
     * Sets up relational data for the new users
     */
    protected function setupRelationalData() {

        $users = User::whereNotIn('type_id', [2, 3])->get();
        $projectLeadUser = User::where('type_id', 1)->first();

        // Users to projects
        $projects = Project::all();
        foreach($projects as $project) {
            $project->staff()->saveMany($users->random(5));
            $project->projectLead()->associate($projectLeadUser);
            $project->save();
        }

        // Users to teams
        $teams = Team::all();
        foreach ($users as $user) {
            $user->team()->save($teams->random());
        }

        // Users to clients
        $clientUser = User::where('name', 'Steve Jobs')->first();
        $accountManagers = User::where('type_id', 1)->get();
        $clients = Client::all();
        foreach ($clients as $client) {
            $client->main_contact_id = $clientUser->id;
            $client->account_manager_id = $accountManagers->random()->id;
            $client->save();
        }

    }

}
