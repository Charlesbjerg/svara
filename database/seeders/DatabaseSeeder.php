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
        // \App\Models\User::factory(10)->create();

        // Call seeder classes
        $this->call([
            ProjectStateSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
        ]);

        // Manually add super admin
        DB::table('users')->insert([
            'name' => 'Charlie Underhill',
            'email' => 'charlie@charlesbjerg.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
