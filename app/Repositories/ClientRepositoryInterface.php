<?php


namespace App\Repositories;

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

}