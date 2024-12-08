<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//use the final keyword if you are not extending ClientController anywhere
final class ClientController extends Controller
{
    //remove properties and inject directly inside 
    protected $project;
    protected $user;
    protected $client;
    protected $clientService;

    public function __construct(
        ClientService $clientService,
        // Project $project,
        // User $user,
        Client $client,
    ) {
        //remove
        $this->clientService = $clientService;
        // $this->project = $project;
        // $this->user = $user;
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse|View
    {
        if ($request->ajax()) {
            return  $this->clientService->getClientDetails();
          }
  
          return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
