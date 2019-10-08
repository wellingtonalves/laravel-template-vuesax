<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Http\Request;

class RolePolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('roles', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('roles-store', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('roles-edit', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('roles-show', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('roles-destroy', $user);
    }
}
