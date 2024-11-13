<?php
namespace App\Services;
use App\Repositories\ClientRepository;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use DataTables;
class ClientService
{
    protected $clientRepository;

    /**
     * ClientService Constructor
     *
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Client create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->clientRepository->create($data);
    }

    /**
     * Client update
     *
     * @param array $data
     * @param Client $client
     * @return void
     */
    public function update(array $data, Client $client)
    {

        return $this->clientRepository->update($data, $client);
    }

    /**
     * Client update
     *
     * @param array $data
     * @param Client $client
     * @return void
     */
    public function delete(Client $client)
    {
        return $this->clientRepository->delete($client);
    }


    /**
    * Client Details
    *
    * @param array $data
    * @return void
    */
    public function getClientDetails() : JsonResponse
    {
        $data = Client::query();
        
        return Datatables::of($data)
            ->addIndexColumn()
            // ->addColumn('Client', function ($row) {
            //     return $row->Client->name ?? 'N/A';
            // })
            // ->addColumn('client', function ($row) {
            //     return $row->client->client_name ?? 'N/A';
            // })
            // ->addColumn('deadline', function ($row) {
            //     return date('d-m-Y', strtotime($row->deadline_at)) ?? 'N/A';
            // })
            ->addColumn('action', function ($row) {
                $editUrl = route('projects.edit', $row->id);
                $deleteUrl = '';
                $btn = '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="' . $editUrl . '" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"  href="' . $deleteUrl . '" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}