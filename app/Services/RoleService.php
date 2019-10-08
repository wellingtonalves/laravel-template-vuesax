<?php


namespace App\Services;

use App\Repositories\RoleRepository;
use App\Services\AbstractService;
use Illuminate\Support\Facades\Log;

class RoleService extends AbstractService
{

    /**
     * @var RoleRepository
     */
    protected $repository;

    /**
     * RoleService constructor.
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Returns a paginated list of Model.
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function all()
    {
        try {
            $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $data = $this->repository->with($this->repository->relationships)
                ->orderBy('page', 'ASC');
            return request()->pagination == 'false' ? $data->all() : $data->paginate();
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao listar. Tente novamente.');
        }
    }
}
