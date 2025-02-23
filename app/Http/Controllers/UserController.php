<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Zona;

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::where('rol', 'Usuario')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Mostrar los detalles de un usuario
        return view('users.show', compact('user'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo usuario
        $zonas = Zona::all();
        return view('users.create', compact('zonas'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|string|email|max:100|unique:users',
            'rol' => 'required|in:Administrador,Usuario',
            'zona_id' => 'required|exists:zonas,id',
            'idiomas' => 'nullable|string|max:50',
            'fecha_contrato' => 'required|date',
            'nombre_user' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);
    
        // Crear el nuevo usuario
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        
        // Crear el usuario y manejar errores
        try {
            User::create($data);
            return redirect()->route('users.index')->with('success', 'Usuario creado con éxito.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al crear el usuario: ' . $e->getMessage()]);
        }
    }

    public function edit(User $user)
    {
        // Mostrar el formulario para editar un usuario
        $zonas = Zona::all();
        return view('users.edit', compact('user', 'zonas'));
    }

    public function update(Request $request, User $user)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|string|email|max:100|unique:users,correo,' . $user->id,
            'rol' => 'required|in:Administrador,Usuario',
            'zona_id' => 'required|exists:zonas,id',
            'idiomas' => 'nullable|string|max:50',
            'fecha_contrato' => 'required|date',
            'nombre_user' => 'required|string|max:15',
            'password' => 'nullable|string|min:8', // Solo validar si se proporciona
        ]);

        // Actualizar los datos del usuario
        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']); // Hashear la contraseña si se proporciona
        } else {
            unset($data['password']); // No actualizar la contraseña si no se proporciona
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy(User $user)
    {
        // Eliminar un usuario
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
