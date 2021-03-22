<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectRepositoryTest extends TestCase
{

    private $repository;

    /**
     * Sets up an instance of the ClientRepository for use in
     * testing.
     */
    protected function setupRepository() {
        $this->repository = new ProjectRepository();
    }

    /**
     * An example data payload to create a new project.
     * @return array
     */
    protected function exampleData() {
        return array (
            'newPipeline' => true,
            'usingTemplate' => false,
            'staff' =>
                array (
                    0 =>
                        array (
                            'id' => 3,
                            'name' => 'Sam Benge',
                            'email' => 'sam@svara.io',
                            'emailVerifiedAt' => '2021-03-22T19:33:46.000000Z',
                            'jobRole' => 'Lead Developer',
                            'typeId' => 1,
                            'createdAt' => '2021-03-22T19:33:46.000000Z',
                            'updatedAt' => '2021-03-22T19:33:46.000000Z',
                            'pivot' =>
                                array (
                                    'team_id' => 1,
                                    'user_id' => 3,
                                ),
                        ),
                    1 =>
                        array (
                            'id' => 12,
                            'name' => 'Danial Murazik',
                            'email' => 'fstamm@example.com',
                            'emailVerifiedAt' => '2021-03-22T19:33:47.000000Z',
                            'jobRole' => NULL,
                            'typeId' => 0,
                            'createdAt' => '2021-03-22T19:33:48.000000Z',
                            'updatedAt' => '2021-03-22T19:33:48.000000Z',
                            'pivot' =>
                                array (
                                    'team_id' => 1,
                                    'user_id' => 12,
                                ),
                        ),
                    2 =>
                        array (
                            'id' => 13,
                            'name' => 'Bianka Brakus',
                            'email' => 'rlang@example.com',
                            'emailVerifiedAt' => '2021-03-22T19:33:47.000000Z',
                            'jobRole' => NULL,
                            'typeId' => 0,
                            'createdAt' => '2021-03-22T19:33:48.000000Z',
                            'updatedAt' => '2021-03-22T19:33:48.000000Z',
                            'pivot' =>
                                array (
                                    'team_id' => 1,
                                    'user_id' => 13,
                                ),
                        ),
                    3 =>
                        array (
                            'id' => 1,
                            'name' => 'Charlie Underhill',
                            'email' => 'charlie@charlesbjerg.com',
                            'emailVerifiedAt' => '2021-03-22T19:33:46.000000Z',
                            'jobRole' => 'Frontend Developer',
                            'typeId' => 2,
                            'createdAt' => '2021-03-22T19:33:46.000000Z',
                            'updatedAt' => '2021-03-22T19:33:46.000000Z',
                        ),
                ),
            'pipeline' =>
                array (
                    0 =>
                        array (
                            'name' => 'Example',
                            'entities' =>
                                array (
                                    0 =>
                                        array (
                                            'id' => 3,
                                            'name' => 'Boards',
                                            'componentName' => 'boards',
                                            'iconLarge' => 'boards',
                                            'iconSmall' => 'fa-columns',
                                            'description' => 'Adds a set of fully customisable kanban style boards to the phase',
                                        ),
                                    1 =>
                                        array (
                                            'id' => 4,
                                            'name' => 'Checklists',
                                            'componentName' => 'checklists',
                                            'iconLarge' => 'checklist',
                                            'iconSmall' => 'fa-clipboard-list',
                                            'description' => 'Adds a simple checklist to the phase',
                                        ),
                                ),
                            'edit' => false,
                        ),
                    1 =>
                        array (
                            'name' => 'Part Two',
                            'entities' =>
                                array (
                                    0 =>
                                        array (
                                            'id' => 2,
                                            'name' => 'Documents',
                                            'componentName' => 'documents',
                                            'iconLarge' => 'documents',
                                            'iconSmall' => 'fa-folder-open',
                                            'description' => 'Adds a folder for file storage to this phase of the project',
                                        ),
                                    1 =>
                                        array (
                                            'id' => 3,
                                            'name' => 'Boards',
                                            'componentName' => 'boards',
                                            'iconLarge' => 'boards',
                                            'iconSmall' => 'fa-columns',
                                            'description' => 'Adds a set of fully customisable kanban style boards to the phase',
                                        ),
                                    2 =>
                                        array (
                                            'id' => 1,
                                            'name' => 'Project Sign-off',
                                            'componentName' => 'project-sign-off',
                                            'iconLarge' => 'sign-off',
                                            'iconSmall' => 'fa-file-signature',
                                            'description' => 'Adding a sign off requires the phase to be signed off before the project can continue',
                                        ),
                                ),
                            'edit' => false,
                        ),
                ),
            'name' => 'Example Project',
            'client' => 'Pied Piper',
            'team' =>
                array (
                    'id' => 1,
                    'name' => 'Development',
                ),
            'projectLead' => 'Sam Benge',
        );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = $this->exampleData();
        $response = $this->postJson('/api/projects', $data);

        // Assert correct response and item has been created
        $response->assertStatus(200);
        $project = Project::where('name', $data['name'])->first();
        $this->assertEquals($data['name'], $project->name);
    }
}
