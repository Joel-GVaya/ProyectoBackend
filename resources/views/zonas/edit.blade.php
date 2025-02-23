@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Zona</h1>
    <form action="{{ route('zonas.update', $zona->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $zona->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Zona</button>
        <a href="{{ route('zonas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
