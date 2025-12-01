@extends('layouts.app')

@section('title', 'Agregar Escuela')

@section('content')

<!-- Título de la página -->
<h2 class="fw-bold mb-3">Agregar Escuela</h2>

<!-- Formulario para crear una nueva escuela -->
<form action="{{ route('schools.store') }}" method="POST">
    @csrf {{-- Token de seguridad obligatorio en formularios POST --}}

    <!-- Campo: Nombre de la escuela -->
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <!-- Campo: Dirección o domicilio de la escuela -->
    <div class="mb-3">
        <label class="form-label">Domicilio</label>
        <input type="text" class="form-control" name="address">
    </div>

    <!-- Botones de acción -->
    <button class="btn btn-success">Guardar</button>

    <!-- Regresar sin guardar -->
    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
