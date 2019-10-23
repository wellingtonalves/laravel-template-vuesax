<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return mixed
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        return parent::save($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @throws AuthorizationException
     */
    public function update(Request $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
