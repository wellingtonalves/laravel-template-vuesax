<?php

namespace App\Policies;

use App\Models\User;

class ClientPolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('clients', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('clients-store', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('clients-edit', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('clients-view', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('clients-destroy', $user);
    }
}
