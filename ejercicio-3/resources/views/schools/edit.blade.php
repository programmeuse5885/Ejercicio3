@extends('layouts.app')

@section('title', 'Editar Escuela')

@section('content')

<!-- Título de la página -->
<h2 class="fw-bold mb-3">Editar Escuela</h2>

<!-- 
    Formulario para actualizar una escuela existente.
    Se envía con método PUT (Laravel lo simula con @method('PUT'))
-->
<form action="{{ route('schools.update', $school) }}" method="POST">
    @csrf                   {{-- Token de seguridad obligatorio --}}
    @method('PUT')          {{-- Indica que esta petición es de actualización --}}

    <!-- Campo: Nombre de la escuela -->
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input 
            type="text" 
            class="form-control" 
            name="name" 
            value="{{ $school->name }}" 
            required
        >
    </div>

    <!-- Campo: Dirección o domicilio de la escuela -->
    <div class="mb-3">
        <label class="form-label">Domicilio</label>
        <input 
            type="text" 
            class="form-control" 
            name="address" 
            value="{{ $school->address }}"
        >
    </div>

    <!-- Botón para actualizar -->
    <button class="btn btn-success">Actualizar</button>

    <!-- Botón para cancelar y volver al listado -->
    <a href="{{ route('schools.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
