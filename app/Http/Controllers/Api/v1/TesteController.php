<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Teste;
use App\Services\TesteService;
use Illuminate\Http\Request;

class TesteController extends AbstractController
{
    /**
     * TesteController constructor.
     * @param TesteService $service
     */
    public function __construct(TesteService $service)
    {
        $this->service = $service;
        $this->model = Teste::class;
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
