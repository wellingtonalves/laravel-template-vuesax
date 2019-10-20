<?php


namespace App\Services;

use App\Criteria\ProfileAdminCriteria;
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
            $this->repository->pushCriteria(ProfileAdminCriteria::class);
            $data = $this->repository->with($this->repository->relationships)->orderBy('id', 'DESC');
            return request()->pagination == 'false' ? $data->all() : $data->paginate();
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao listar. Tente novamente.');
        }
    }
}
