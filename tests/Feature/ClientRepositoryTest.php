<?php

namespace Tests\Feature;

use App\Models\Client;
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
    public function setupRepository() {
        $this->repository = new ClientRepository();
    }

    /**
     * Fetches any client from the DB for use in testing
     *
     * @return Client
     */
    public function fetchClient() {
        return Client::first();
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

    }

    public function testAccountManagerFilter()
    {
        // Test setup
        $this->setupRepository();
        $exampleClient = $this->fetchClient();

        // Filter by account manager ID
        $accountManagerId = $exampleClient->accountManager;
        $filterResults = $this->repository->filterClients(['account_manager_id', $accountManagerId]);

        // Assert results are returned
        $this->assertNotEmpty($filterResults);
        $this->assertInstanceOf(Collection::class, $filterResults);
    }

    public function testProjectLeadFilter()
    {

    }

    public function testSortByFilter() {

    }

}
