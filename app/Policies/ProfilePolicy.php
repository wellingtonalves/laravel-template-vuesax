<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilePolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('profiles', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('profiles-store', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('profiles-edit', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('profiles-show', $user);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('profiles-destroy', $user);
    }
}
