<?php


namespace App\Repositories;

use App\Models\Project;
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
    public function filterClients(array $request): Collection {

        $filters = [];

        if (isset($request['name'])) {
            $filters[] = ['name', 'like', '%'.$request['name'].'%'];
        }

        if (isset($request['accountManager'])) {
            $filters[] = ['account_manager_id', $request['accountManager']];
        }

        return Client::where($filters)->get();

    }

    /**
     * Returns all data for a client, relational and otherwise.
     *
     * @param Client $client
     * @return mixed
     */
    public function getClient(Client $client) {
        $client->load(['projects', 'members', 'mainContact', 'accountManager']);
        $client->projects->load(['state', 'currentPhase', 'meta', 'projectLead']);
        $data['client'] = $client;
        $data['projectCount'] = Project::where('client_id', $client->id)->count();
        return $data;
    }

}