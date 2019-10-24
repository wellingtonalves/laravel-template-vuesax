<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\RepresentativeRequest;
use App\Models\Representative;
use App\Services\RepresentativeService;
use Illuminate\Auth\Access\AuthorizationException;

class RepresentativeController extends AbstractController
{
    /**
     * RepresentativeController constructor.
     * @param RepresentativeService $service
     */
    public function __construct(RepresentativeService $service)
    {
        $this->service = $service;
        $this->model = Representative::class;
    }

    /**
     * @param RepresentativeRequest $request
     * @return mixed
     * @throws AuthorizationException
     */
    public function store(RepresentativeRequest $request)
    {
        return parent::save($request);
    }

    /**
     * @param RepresentativeRequest $request
     * @param $id
     * @return mixed
     * @throws AuthorizationException
     */
    public function update(RepresentativeRequest $request, $id)
    {
        return parent::updateAs($request, $id);
    }
}
