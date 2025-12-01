@extends('layouts.app')

@section('title', 'Editar Maestro')

@section('content')
<h2 class="fw-bold mb-3">Editar Maestro</h2>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- Formulario para actualizar maestro --}}
        <form action="{{ route('teachers.update', $teacher) }}" method="POST">
            @csrf
            @method('PUT') {{-- Indica que es una actualización --}}

            {{-- Campo: Nombre --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="first_name" 
                    value="{{ $teacher->first_name }}" 
                    class="form-control" 
                    required
                >
            </div>

            {{-- Campo: Apellidos --}}
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input 
                    type="text" 
                    name="last_name" 
                    value="{{ $teacher->last_name }}" 
                    class="form-control" 
                    required
                >
            </div>

            {{-- Campo: Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ $teacher->email }}" 
                    class="form-control"
                >
            </div>

            {{-- Campo: Teléfono --}}
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input 
                    type="text" 
                    name="phone" 
                    value="{{ $teacher->phone }}" 
                    class="form-control"
                >
            </div>

            {{-- Selección de Escuela --}}
            <div class="mb-3">
                <label class="form-label">Escuela</label>
                <select name="school_id" class="form-control" required>

                    @foreach ($schools as $school)
                        <option 
                            value="{{ $school->id }}"
                            {{ $teacher->school_id == $school->id ? 'selected' : '' }}
                        >
                            {{ $school->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Botones de acción --}}
            <div class="mt-4">
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>

    </div>
</div>
@endsection
