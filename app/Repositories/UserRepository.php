<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository extends AbstractRepository
{
    /**
     * Relationships (with)
     * @var array
     */
    public $relationships = [

    ];

    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
