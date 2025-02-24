@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zonas</h1>
    <a href="{{ route('zonas.create') }}" class="btn btn-primary">Crear Nueva Zona</a>
    <br>
    <br>
    <br>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-3">Volver al panel de Administración</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zonas as $zona)
            <tr>
                <td>{{ $zona->id }}</td>
                <td>{{ $zona->nombre }}</td>
                <td>
                    <a href="{{ route('zonas.edit', $zona->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('zonas.destroy', $zona->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta zona?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
