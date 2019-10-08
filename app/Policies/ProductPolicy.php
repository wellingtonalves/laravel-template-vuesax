<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy extends PolicyAbstract
{
    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return self::check('products', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function store(User $user)
    {
        return self::check('products-store', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return self::check('products-edit', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function show(User $user)
    {
        return self::check('products-view', $user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function destroy(User $user)
    {
        return self::check('products-destroy', $user);
    }
}
