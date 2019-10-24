<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Representative;
use App\Services\RepresentativeService;
use Illuminate\Http\Request;

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
         * @param Request $request
         * @return mixed
         * @throws \Illuminate\Auth\Access\AuthorizationException
         */
        public function store(Request $request)
        {
            return parent::save($request);
        }

        /**
         * @param Request $request
         * @param $id
         * @return mixed
         * @throws \Illuminate\Auth\Access\AuthorizationException
         */
        public function update(Request $request, $id)
        {
            return parent::updateAs($request, $id);
        }
}
