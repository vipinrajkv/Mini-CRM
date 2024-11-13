<?php

namespace App\Repositories;
use App\Models\Client;

class ClientRepository 
{
    /**
     * @var Client
     */
    protected  $client;

    /**
     * ClientRepository Constructor
     *
     * @param Client  $client
     */
    public function __construct(Client  $client) {
        $this->client =  $client;
    }

    /**
     * Client create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->client->create($data);
    }

    /**
     *  Client update
     *
     * @param array $data
     * @param Client  $client
     * @return void
     */
    public function update(array $data,  Client  $client)
    {
         $client->update($data);
    }

    /**
     * Client delete
     *
     * @param Client  $client
     * @return void
     */
    public function delete(Project  $client)
    {
         $client->delete();
    }
} 