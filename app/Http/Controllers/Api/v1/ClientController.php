<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Auth\Access\AuthorizationException;

class ClientController extends AbstractController
{
    /**
     * ClientController constructor.
     * @param ClientService $service
     */
    public function __construct(ClientService $service)
    {
        $this->service = $service;
        $this->model = Client::class;
    }

    /**
     * @param ClientRequest $request
     * @return mixed
     * @throws AuthorizationException
     */
    public function store(ClientRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param ClientRequest $request
     * @param $id
     * @return mixed
     * @throws AuthorizationException
     */
    public function update(ClientRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
