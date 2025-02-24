@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="idiomas">Idiomas</label>
            <input type="text" name="idiomas" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_contrato">Fecha de Contrato</label>
            <input type="date" name="fecha_contrato" class="form-control" required>
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
            <input type="text" name="nombre_user" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Crear Usuario</button>
    </form>
</div>

<a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>

@endsection
