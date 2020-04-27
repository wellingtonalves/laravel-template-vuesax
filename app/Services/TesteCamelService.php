<?php


namespace App\Services;

use App\Repositories\TesteCamelRepository;
use App\Services\AbstractService;

class TesteCamelService extends AbstractService
{

    /**
     * @var TesteCamelRepository
     */
    protected $repository;

    /**
     * TesteCamelService constructor.
     * @param TesteCamelRepository $repository
     */
    public function __construct(TesteCamelRepository $repository)
    {
        $this->repository = $repository;
    }
}
