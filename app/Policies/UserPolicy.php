<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, User $model)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->rol == 'Administrador';
    }

    public function update(User $user, User $model)
    {
        return $user->rol == 'Administrador';
    }

    public function delete(User $user, User $model)
    {
        return $user->rol == 'Administrador';
    }
}
