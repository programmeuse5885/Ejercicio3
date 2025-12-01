@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')

    {{-- Contenedor principal centrado --}}
    <div class="text-center py-5">

        {{-- Título principal --}}
        <h1 class="fw-bold mb-4">📘 Bienvenido al Sistema de Administracion Escolar</h1>

        {{-- Descripción del sistema --}}
        <p class="lead text-secondary mb-4">
            Sistema para gestionar escuelas, maestros y estudiantes.
        </p>

        {{-- Botones principales de navegación --}}
        <div class="d-flex justify-content-center gap-3 flex-wrap">

            {{-- Botón para administrar escuelas --}}
            <a href="{{ route('schools.index') }}" class="btn btn-primary btn-lg">
                🏫 Administrar Escuelas
            </a>

            {{-- Botón para administrar maestros --}}
            <a href="{{ route('teachers.index') }}" class="btn btn-success btn-lg">
                👩‍🏫 Administrar Maestros
            </a>

            {{-- Botón para administrar estudiantes --}}
            <a href="{{ route('students.index') }}" class="btn btn-info btn-lg text-white">
                🎓 Administrar Estudiantes
            </a>

        </div>
    </div>

@endsection
