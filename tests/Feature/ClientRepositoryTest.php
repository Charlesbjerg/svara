<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Project;
use App\Repositories\ClientRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientRepositoryTest extends TestCase
{

    private $repository;

    /**
     * Sets up an instance of the ClientRepository for use in
     * testing.
     */
    protected function setupRepository() {
        $this->repository = new ClientRepository();
    }

    /**
     * Fetches any client from the DB for use in testing
     *
     * @return Client
     */
    protected function fetchClient() {
        return Client::first();
    }

    /**
     * Fetches any project from the DB for use in testing
     *
     * @return Client
     */
    protected function fetchProject() {
        return Project::first();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSearchTermFilter()
    {
        // Test setup
        $this->setupRepository();
        $exampleClient = $this->fetchClient();

        // Filter clients by name
        $searchTerm = $exampleClient->name;
        $filterResults = $this->repository->filterClients(['name' => $searchTerm]);

        // Assert results are returned
        $this->assertNotEmpty($filterResults);
        $this->assertInstanceOf(Collection::class, $filterResults);

        // Grab random client for testing
        $exampleClient = $filterResults->random();
        $this->assertStringContainsString($searchTerm, $exampleClient->name);

    }

    public function testAccountManagerFilter()
    {
        // Test setup
        $this->setupRepository();
        $exampleClient = $this->fetchClient();

        // Filter by account manager ID
        $accountManagerId = $exampleClient->accountManager->id;
        $filterResults = $this->repository->filterClients(['account_manager_id' => $accountManagerId]);

        // Assert results are returned
        $this->assertNotEmpty($filterResults);

        // Grab a random client and check ID's match up
        $randomClient = $filterResults->random();
        $this->assertEquals($accountManagerId, $randomClient->accountManager->id);

    }

    public function testCombinedFilters()
    {
        // Test setup
        $this->setupRepository();
        $exampleClient = $this->fetchClient();

        // Filter by account manager ID and search term
        $searchTerm = $exampleClient->name;
        $accountManagerId = $exampleClient->accountManager->id;
        $filterResults = $this->repository->filterClients([
            'account_manager_id' => $accountManagerId,
            'name' => $searchTerm,
        ]);

        // Assert results are returned
        $this->assertNotEmpty($filterResults);
        $this->assertInstanceOf(Collection::class, $filterResults);

        // Grab a random client, check ID's match up and searchTerm is accurate
        $randomClient = $filterResults->random();
        $this->assertEquals($accountManagerId, $randomClient->accountManager->id);
        $this->assertStringContainsString($searchTerm, $exampleClient->name);
    }

}
