<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class AbstractService
{
    /**
     * @var \App\Repositories\AbstractRepository
     */
    protected $repository;

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
            $data = $this->repository->with($this->repository->relationships)->orderBy('id', 'DESC');
            return request()->pagination == 'false' ? $data->all() : $data->paginate();
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao listar. Tente novamente.');
        }
    }

    /**
     * Data of a Model by primary key
     *
     * @param int|string $uuid
     *
     * @return mixed
     * @throws \Exception
     */
    public function find($uuid)
    {
        try {
            return $this->repository->with($this->repository->relationships)->find($uuid);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao detalhar. Tente novamente.');
        }
    }

    /**
     * Store a newly created Model in storage.
     *
     * @param Request $request
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(Request $request)
    {
        try {
            $this->repository->create($request->all());
            return 'Registro criado com sucesso.';
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao criar. Tente novamente.');
        }
    }

    /**
     * Update the specified Model in storage.
     *
     * @param Request $request
     * @param $uuid
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function update(Request $request, $uuid)
    {
        try {
            $this->repository->find($uuid)->update($request->all());
            return 'Registro atualizado com sucesso.';
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao atualizar. Tente novamente.');
        }
    }

    /**
     * Remove the specified Model from storage.
     *
     * @param int|string $uuid
     *
     * @return null
     * @throws \Exception
     */
    public function destroy($uuid)
    {
        try {
            $this->repository->find($uuid)->delete();
            return 'Registro excluído com sucesso.';
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return new \Exception('Erro ao excluir. Tente novamente.');
        }
    }
}
