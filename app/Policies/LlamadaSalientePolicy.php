<?php

namespace App\Policies;

use App\Models\LlamadaSaliente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LlamadaSalientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LlamadaSaliente $llamadaSaliente): bool
    {
        return ($user->rol == 'Usuario' && $user->id == $llamadaSaliente->user_id) || $user->rol == 'Administrador' ;
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
    public function update(User $user, LlamadaSaliente $llamadaSaliente): bool
    {
        return $user->rol == 'Usuario' && $user->id == $llamadaSaliente->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LlamadaSaliente $llamadaSaliente): bool
    {
        return $user->rol == 'Administrador';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LlamadaSaliente $llamadaSaliente): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LlamadaSaliente $llamadaSaliente): bool
    {
        return true;
    }
}
