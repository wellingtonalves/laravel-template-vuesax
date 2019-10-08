<?php

namespace App\Repositories;

use Exception;
use Prettus\Validator\Exceptions\ValidatorException;

abstract class AbstractRepository extends \Prettus\Repository\Eloquent\BaseRepository
{

    public $relationships = [];

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws Exception
     */
    public function create(array $attributes)
    {
        $result = parent::create($attributes);

        return $this->with($this->relationships)->find($result->uuid);
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $uuid
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws Exception
     */
    public function update(array $attributes, $uuid)
    {
        parent::update($attributes, $uuid);

        return $this->with($this->relationships)->find($uuid);
    }

    /**
     * Update or Create an entity in repository
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     * @throws Exception
     *
     * @throws ValidatorException
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $result = parent::updateOrCreate($attributes, $values);
        $primaryKey = $result->getKeyName();

        return $this->with($this->relationships)->find($result->$primaryKey);
    }

    /**
     * Retrieve first data of repository, or return new Entity
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws Exception
     */
    public function firstOrNew(array $attributes = [])
    {
        return parent::firstOrNew($attributes);
    }

    /**
     * Retrieve first data of repository, or create new Entity
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws Exception
     */
    public function firstOrCreate(array $attributes = [])
    {
        $result = parent::firstOrCreate($attributes);

        return $this->with($this->relationships)->find($result->uuid);
    }

    /**
     * Overriding Delete a entity in repository by id
     *
     * @param $uuid
     *
     * @return int
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function delete($uuid)
    {
        $request = $this->with($this->relationships)->find($uuid);
        parent::delete($uuid);

        return $request;
    }

    /**
     * Find data by id
     *
     * @param       $uuid
     * @param array $columns
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function find($uuid, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->uuid($uuid, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Overriding Load relations
     *
     * @param array|string $relations
     *
     * @return AbstractRepository|\Prettus\Repository\Eloquent\BaseRepository
     */
    public function with($relations)
    {
        return !empty($relations) ? parent::with($relations) : $this;
    }

    /**
     * Find data by multiple fields
     *
     * @param $column
     * @param $condition
     * @param $val
     * @return mixed
     */
    public function where($column, $condition, $val)
    {
        $this->applyCriteria();
        $this->applyScope();
        $this->model = $this->model->where($column, $condition, $val);
        return $this;
    }
}
