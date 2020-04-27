<?php

namespace App\Models;

use App\Models\AbstractModel;

class Representative extends AbstractModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'cnpj',
        'phone'
    ];

    /**
     * The nested's (relations)
     *
     * @var array
     */
    public $nested = [
        'user'
    ];

    /**
     * The with's (relations)
     *
     * @var array
     */
    public $with = [
        'user'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
