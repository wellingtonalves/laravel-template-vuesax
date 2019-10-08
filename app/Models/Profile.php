<?php

namespace App\Models;


class Profile extends AbstractModel
{
    protected $with = ['role'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public $nested = ['role'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany(Role::class, 'profile_roles');
    }
}
