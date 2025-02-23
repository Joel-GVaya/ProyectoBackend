@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Zona</h1>
    <form action="{{ route('zonas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Zona</button>
        <a href="{{ route('zonas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
