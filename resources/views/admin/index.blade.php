@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Panel de Administración</h1>
    <p>Selecciona qué módulo deseas administrar:</p>

    <div class="row justify-content-center mt-4">
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-primary mb-3">
                Gestionar Usuarios
            </a>
        </div>
        <br>
        <br>
        <div >
            <a href="{{ route('zonas.index') }}" class="btn btn-primary mb-3">
                Gestionar Zonas
            </a>
        </div>
    </div>
</div>
@endsection
