@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')

{{-- Encabezado con título y botón para agregar estudiante --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Estudiantes</h2>

    {{-- Botón para ir al formulario de creación --}}
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        ➕ Add Student
    </a>
</div>

{{-- Mensaje de éxito al realizar alguna acción (crear, actualizar, borrar) --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Si no hay estudiantes en la base de datos --}}
@if($students->isEmpty())
    <div class="alert alert-info">
        No se encontraron estudiantes. Agrega uno.
    </div>

@else

{{-- Tabla con la lista de estudiantes --}}
<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Escuela</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>

    <tbody>
        {{-- Recorremos todos los estudiantes --}}
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>

            {{-- Nombre y apellidos --}}
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>

            {{-- Escuela a la que pertenece (si existe) --}}
            <td>{{ $student->school->name ?? '—' }}</td>

            <td class="text-center">

                {{-- Botón para editar --}}
                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">
                    ✏
                </a>

                {{-- Formulario para eliminar estudiante --}}
                <form action="{{ route('students.destroy', $student) }}"
                      method="POST"
                      class="d-inline-block"
                      onsubmit="return confirm('¿Eliminar este estudiante?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger">
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
