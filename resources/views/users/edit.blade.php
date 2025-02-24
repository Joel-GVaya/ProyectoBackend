@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $user->nombre) }}" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $user->correo) }}" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="Administrador" {{ $user->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Usuario" {{ $user->rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="idiomas">Idiomas</label>
            <input type="text" name="idiomas" class="form-control" value="{{ old('idiomas', $user->idiomas) }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_contrato">Fecha de Contrato</label>
            <input type="date" name="fecha_contrato" class="form-control" value="{{ old('fecha_contrato', $user->fecha_contrato) }}" required>
        </div>

        <div class="form-group">
            <label for="zona_id">Zona</label>
            <select name="zona_id" class="form-control" required>
                <option value="">Seleccione una zona</option>
                @foreach ($zonas as $zona)
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_user">Nombre de Usuario</label>
            <input type="text" name="nombre_user" class="form-control" value="{{ old('nombre_user', $user->nombre_user) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña (dejar vacío si no se quiere cambiar)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
    </form>
</div>

<a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>

@endsection
