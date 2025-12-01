@extends('layouts.app')

@section('title', 'Agregar Estudiante')

@section('content')
<h2 class="fw-bold mb-3">Agregar Estudiante</h2>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- Formulario para agregar un nuevo estudiante --}}
        <form action="{{ route('students.store') }}" method="POST">
            {{-- Token de seguridad para formularios (previene ataques CSRF) --}}
            @csrf

            {{-- Campo para el nombre del estudiante --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            {{-- Campo para los apellidos del estudiante --}}
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            {{-- Lista desplegable de escuelas disponibles --}}
            <div class="mb-3">
                <label class="form-label">Escuela</label>
                <select name="school_id" class="form-control" required>
                    <option value="">-- Selecciona una escuela --</option>

                    {{-- Ciclo que recorre todas las escuelas enviadas desde el controlador --}}
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Botones de acción: guardar o cancelar --}}
            <div class="mt-4">
                <button class="btn btn-primary">Guardar</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

    </div>
</div>
@endsection
