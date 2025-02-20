<?php

namespace App\Policies;

use App\Models\Aviso;
use App\Models\User;


class AvisoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol == 'Administrador' || $user->rol == 'Usuario' ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Aviso $aviso): bool
    {
        return $user->rol == 'Usuario' && $user->zona_id == $aviso->zona_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol == 'Usuario';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Aviso $aviso): bool
    {
        return $user->rol == 'Usuario' && $user->zona_id == $aviso->zona_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Aviso $aviso): bool
    {
        return $user->rol == 'Usuario' && $user->zona_id == $aviso->zona_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Aviso $aviso): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aviso $aviso): bool
    {
        return false;
    }
}
