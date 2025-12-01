@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
<h2 class="fw-bold mb-3">Editar Estudiante</h2>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- Formulario para actualizar los datos del estudiante --}}
        <form action="{{ route('students.update', $student) }}" method="POST">
            {{-- Token de seguridad para evitar ataques CSRF --}}
            @csrf

            {{-- Indica que esta petición es de tipo PUT (actualización) --}}
            @method('PUT')

            {{-- Campo para editar el nombre del estudiante --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="first_name" 
                    value="{{ $student->first_name }}" 
                    class="form-control" 
                    required
                >
            </div>

            {{-- Campo para editar los apellidos --}}
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input 
                    type="text" 
                    name="last_name" 
                    value="{{ $student->last_name }}" 
                    class="form-control" 
                    required
                >
            </div>

            {{-- Selector para cambiar la escuela del estudiante --}}
            <div class="mb-3">
                <label class="form-label">Escuela</label>
                <select name="school_id" class="form-control">
                    <option value="">-- Ninguna --</option>

                    {{-- Recorre todas las escuelas disponibles --}}
                    @foreach ($schools as $school)
                        <option 
                            value="{{ $school->id }}"
                            {{-- Si la escuela coincide con la asignada al estudiante, marcar como seleccionada --}}
                            @if($school->id == $student->school_id) selected @endif
                        >
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botones de acción --}}
            <div class="mt-4">
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>

    </div>
</div>
@endsection
