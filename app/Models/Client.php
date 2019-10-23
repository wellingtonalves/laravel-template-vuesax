<?php

namespace App\Models;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends AbstractModel
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
        'cpf'
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
