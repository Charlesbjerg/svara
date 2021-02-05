<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $project_names = ['Bespoke Website', 'Payment Gateway Update', '12 Month SEO Campaign', 'Bespoke eCommerce Site', 'Company Rebrand', 'Frontend Redesign', 'AWS Migration'];
        $states = ProjectState::all();
        $clients = Client::all();

        return [
            'name' => $this->getRandomItem($project_names),
            'client_id' => $this->getRandomItem($clients)->id,
            'project_state_id' => $this->getRandomItem($states)->id,
        ];
    }

    private function getRandomItem($array) {
        return $array[rand(0, count($array) - 1)];
    }


}
