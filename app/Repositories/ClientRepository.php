<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{

    /**
     * Returns a collection of projects available to the user,
     * projects they are not involved with do not appear.
     *
     * @param array $request
     * @return Collection
     */
    public function filterClients(array $request): Collection
    {

        $filters = [];

        foreach($request as $key => $value) {
            $filters[] = [$key, $value];
        }

        return Client::where($filters)->get();

    }

}