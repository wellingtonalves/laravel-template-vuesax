<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\TesteCamel;
use App\Services\TesteCamelService;
use Illuminate\Http\Request;

class TesteCamelController extends AbstractController
{
    /**
     * TesteCamelController constructor.
     * @param TesteCamelService $service
     */
    public function __construct(TesteCamelService $service)
    {
        $this->service = $service;
        $this->model = TesteCamel::class;
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
