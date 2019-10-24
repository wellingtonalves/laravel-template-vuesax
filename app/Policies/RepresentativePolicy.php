<?php

namespace App\Policies;

use App\Models\User;

class RepresentativePolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('representatives', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('representatives-store', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('representatives-edit', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('representatives-view', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('representatives-destroy', $user);
    }
}
