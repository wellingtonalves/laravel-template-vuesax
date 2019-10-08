<?php


namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\AbstractController;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends AbstractController
{
    /**
     * ProfileController constructor.
     * @param ProfileService $service
     */
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
        $this->model = Profile::class;
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
