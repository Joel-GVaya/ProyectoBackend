@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
    <br>    
    <br>
    <br>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-3">Volver al panel de Administración</a>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Zona</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->rol }}</td>
                <td>{{ $user->zona->nombre }}</td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-info">Ver Detalles</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
