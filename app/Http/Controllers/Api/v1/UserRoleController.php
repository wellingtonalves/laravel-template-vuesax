<?php


namespace App\Http\Api\v1\Controllers;

use App\Http\Controllers\AbstractController;
use App\Models\UserRole;
use App\Service\UserRoleService;
use Illuminate\Http\Request;

class UserRoleController extends AbstractController
{
    /**
     * UserRoleController constructor.
     * @param UserRoleService $service
     */
    public function __construct(UserRoleService $service)
    {
        $this->service = $service;
        $this->model = UserRole::class;
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
