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

        if (isset($request['name'])) {
            $filters[] = ['name', 'like', '%'.$request['name'].'%'];
        }

        if (isset($request['account_manager_id'])) {
            $filters[] = ['account_manager_id', $request['account_manager_id']];
        }

        return Client::where($filters)->get();

    }

}