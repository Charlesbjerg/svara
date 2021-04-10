<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\ClientRepositoryInterface;

class ClientController extends Controller
{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $clients = [];
        if (empty($request->all())) {
            $clients = Client::all()->sortBy('name');
        } else {
            $clients = $this->clientRepository->filterClients($request->all());
        }
        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return JsonResponse
     */
    public function show(Client $client)
    {
        $clientData = $this->clientRepository->getClient($client);
        return response()->json($clientData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\Client  $client
     * @return JsonResponse
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return JsonResponse
     */
    public function destroy(Client $client)
    {
        //
    }

    /**
     * Searches through all clients based on passed filters.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request) : JsonResponse {
        $clients = $this->clientRepository->filterClients($request->all());
        return response()->json($clients);
    }

}
