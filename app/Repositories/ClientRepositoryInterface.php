<?php


namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface
{

    /**
     * Takes request data and filters the clients available
     *
     * @param array $request
     * @return Collection
     */
    public function filterClients(array $request) : Collection;

    /**
     * Returns all data for a client, relational and otherwise.
     *
     * @param Client $client
     * @return mixed
     */
    public function getClient(Client $client);

}