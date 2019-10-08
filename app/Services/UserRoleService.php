<?php


namespace App\Service;

use App\Repositories\UserRoleRepository;
use App\Services\AbstractService;

class UserRoleService extends AbstractService
{

    /**
     * @var UserRoleRepository
     */
    protected $repository;

    /**
     * UserRoleService constructor.
     * @param UserRoleRepository $repository
     */
    public function __construct(UserRoleRepository $repository)
    {
        $this->repository = $repository;
    }
}
