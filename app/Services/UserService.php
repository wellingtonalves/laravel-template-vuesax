<?php


namespace App\Services;

use App\Criteria\UserDefaultCriteria;
use App\Criteria\UserTypeCriteria;
use App\Repositories\UserRepository;
use App\Services\AbstractService;

class UserService extends AbstractService
{
    /**
     * @var $repository
     */
    protected $repository;

    /**
     * UserRepository constructor.
     * @param UserRepository $clientRepository
     */
    public function __construct(UserRepository $clientRepository)
    {
        $this->repository = $clientRepository;
    }

    /**
     * Returns a paginated list of Model.
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function all()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $this->repository->pushCriteria(UserDefaultCriteria::class);
        $data = $this->repository->with($this->repository->relationships)->orderBy('id', 'DESC');
        return request()->pagination == 'false' ? $data->all() : $data->paginate();
    }
}
