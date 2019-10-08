<?php


namespace App\Services;

use App\Repositories\ProfileRepository;
use App\Services\AbstractService;
use Illuminate\Support\Facades\Log;

class ProfileService extends AbstractService
{

    /**
     * @var ProfileRepository
     */
    protected $repository;

    /**
     * ProfileService constructor.
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }
}
