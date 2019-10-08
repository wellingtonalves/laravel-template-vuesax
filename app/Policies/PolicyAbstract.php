<?php


namespace App\Policies;


abstract class PolicyAbstract
{

    /**
     * @param $role
     * @param $user
     * @return bool
     */
    public function check($role, $user)
    {
        if ($user->is_admin) {
            return true;
        }

        return in_array($role, array_column($user->profile->role->toArray(), 'name'));
    }
}