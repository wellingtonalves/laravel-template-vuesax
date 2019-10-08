<?php


namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\AbstractService;

class ProductService extends AbstractService
{

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * ProductService constructor.
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
}
