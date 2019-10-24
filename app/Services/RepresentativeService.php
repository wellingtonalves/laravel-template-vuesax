<?php


namespace App\Services;

use App\Repositories\RepresentativeRepository;
use App\Services\AbstractService;

class RepresentativeService extends AbstractService
{

    /**
     * @var RepresentativeRepository
     */
    protected $repository;

    /**
     * RepresentativeService constructor.
     * @param RepresentativeRepository $repository
     */
    public function __construct(RepresentativeRepository $repository)
    {
        $this->repository = $repository;
    }
}
