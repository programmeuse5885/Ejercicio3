@extends('layouts.app')

@section('title', 'Maestros')

@section('content')

    {{-- Título y botón para agregar un nuevo maestro --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Maestros</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">
            ➕ Nuevo Maestro
        </a>
    </div>

    {{-- Mensaje de éxito al realizar una acción --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Si no existen maestros, mostrar mensaje informativo --}}
    @if($teachers->isEmpty())
        <div class="alert alert-info">
            No se encontraron maestros. Agrega uno.
        </div>
    @else

        {{-- Tabla con el listado de maestros --}}
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Escolar</th>
                    <th width="150">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>

                    {{-- Mostrar la escuela del maestro o guion si no tiene --}}
                    <td>{{ $teacher->school->name ?? '—' }}</td>

                    {{-- Acciones: editar y eliminar --}}
                    <td class="text-center">
                        <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-sm btn-warning">
                            ✏ 
                        </a>

                        <form action="{{ route('teachers.destroy', $teacher) }}"
                              method="POST"
                              class="d-inline-block"
                              onsubmit="return confirm('¿Eliminar este maestro?')">

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
