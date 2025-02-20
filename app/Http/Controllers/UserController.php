<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends BaseController
{
    use AuthorizesRequests;

    /**
     * Mostrar una lista de usuarios.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return $this->sendResponse($users, 'Lista de usuarios obtenida con éxito.');
    }

    /**
     * Guardar un nuevo usuario en la base de datos.
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); 
        $user = User::create($data);
        return $this->sendResponse($user, 'Usuario creado con éxito.', 201);
    }

    /**
     * Mostrar los detalles de un usuario específico.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $this->sendResponse($user, 'Detalles del usuario obtenidos con éxito.');
    }

    /**
     * Actualizar la información de un usuario.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return $this->sendResponse($user, 'Usuario actualizado con éxito.', 200);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return $this->sendResponse([], 'Usuario eliminado con éxito.', 200);
    }
}
