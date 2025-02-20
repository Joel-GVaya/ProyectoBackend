<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->esAdmin();
    }

    public function view(User $user, User $model)
    {
        return $user->esAdmin() || $user->id === $model->id;
    }

    public function create(User $user)
    {
        return $user->esAdmin();
    }

    public function update(User $user, User $model)
    {
        return $user->esAdmin() || $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->esAdmin();
    }
}
