@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
    <p><strong>Teléfono:</strong> {{ $user->telefono }}</p>
    <p><strong>Correo:</strong> {{ $user->correo }}</p>
    <p><strong>Rol:</strong> {{ $user->rol }}</p>
    <p><strong>Zona:</strong> {{ $user->zona->nombre }}</p>
    <p><strong>Idiomas:</strong> {{ $user->idiomas }}</p>
    <p><strong>Fecha de Contrato:</strong> {{ $user->fecha_contrato }}</p>
    <p><strong>Nombre de Usuario:</strong> {{ $user->nombre_user }}</p>
    <p><strong>Contraseña:</strong> {{ $user->password }}</p>
    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
