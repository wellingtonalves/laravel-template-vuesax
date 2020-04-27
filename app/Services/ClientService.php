<?php


namespace App\Services;

use App\Repositories\ClientRepository;
use App\Services\AbstractService;

class ClientService extends AbstractService
{

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * ClientService constructor.
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
}
