<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $clients = [
            ['name' => 'Pied Piper', 'contact_number' => '01234 567890', 'contact_email' => 'info@piedpiper.com', 'logo_path' => 'assets/logos/pied-piper-logo.jpg'],
            ['name' => 'Hooli', 'contact_number' => '01234 567890', 'contact_email' => 'gavin.belson@hooli.io', 'logo_path' => 'assets/logos/hooli-logo.png'],
            ['name' => 'Aviato', 'contact_number' => '01234 567890', 'contact_email' => 'erlich@aviato.com', 'logo_path' => 'assets/logos/aviato-logo.png'],
        ];

        DB::table('clients')->insert($clients);
    }
}
