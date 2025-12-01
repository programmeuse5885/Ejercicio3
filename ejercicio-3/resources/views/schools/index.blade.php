@extends('layouts.app')

@section('title', 'Escuelas')

@section('content')

<!-- Encabezado con título y botón para crear nueva escuela -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Escuelas</h2>

    <!-- Botón para ir al formulario de creación -->
    <a href="{{ route('schools.create') }}" class="btn btn-primary">
        ➕ Agregar Escuela
    </a>
</div>

<!-- Mensaje de éxito cuando se crea/actualiza/elimina -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Mostrar mensaje si no hay escuelas registradas -->
@if($schools->isEmpty())
    <div class="alert alert-info">
        No se encontraron escuelas. Agrega una.
    </div>

@else
<!-- Tabla que lista todas las escuelas -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($schools as $school)
        <tr>
            <!-- Nombre de la escuela -->
            <td>{{ $school->name }}</td>

            <!-- Dirección de la escuela -->
            <td>{{ $school->address }}</td>

            <!-- Acciones: Editar y Eliminar -->
            <td>

                <!-- Botón para editar -->
                <a href="{{ route('schools.edit', $school) }}" class="btn btn-warning btn-sm">
                    ✏
                </a>

                <!-- Formulario para eliminar una escuela -->
                <form 
                    action="{{ route('schools.destroy', $school) }}" 
                    method="POST" 
                    class="d-inline"
                >
                    @csrf
                    @method('DELETE')

                    <!-- Confirmación antes de eliminar -->
                    <button 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar esta escuela?')"
                    >
                        🗑
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
