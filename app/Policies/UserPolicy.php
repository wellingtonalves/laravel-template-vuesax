<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Http\Request;

class UserPolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('users', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('users-store', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('users-edit', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('users-show', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('users-destroy', $user);
    }
}
