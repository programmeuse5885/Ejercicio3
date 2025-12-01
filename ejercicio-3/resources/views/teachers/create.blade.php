@extends('layouts.app')

@section('title', 'Agregar Maestro')

@section('content')
<h2 class="fw-bold mb-3">Agregar Maestro</h2>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- Formulario para crear un maestro --}}
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf {{-- Token de seguridad requerido por Laravel --}}

            {{-- Campo: Nombre --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            {{-- Campo: Apellidos --}}
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            {{-- Campo: Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            {{-- Campo: Teléfono --}}
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="text" name="phone" class="form-control">
            </div>

            {{-- Selección de Escuela --}}
            <div class="mb-3">
                <label class="form-label">Escuela</label>
                <select name="school_id" class="form-control" required>
                    <option value="">-- Selecciona una Escuela --</option>

                    {{-- Listado de escuelas en el selector --}}
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Botones de acción --}}
            <div class="mt-4">
                <button class="btn btn-primary">Guardar</button>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>

        </form>

    </div>
</div>
@endsection
