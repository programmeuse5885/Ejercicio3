<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;

/* ====================================
   Ruta principal (página de inicio)
   ==================================== */
Route::get('/', function () {
    return view('index');
});


/* ====================================
   Rutas para Maestros
   ==================================== */

//Mostrar lista de maestros
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

//Mostrar formulario para crear un maestro
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');

//Guardar maestro en la bd
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

//Mostrar formulario para editar un maestro
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');

//Actualizar maestro existente
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');

//Eliminar maestro
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');



/* ====================================
   Rutas para Estudiantes
   ==================================== */

//Mostrar lista de estudiantes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

//Mostrar formulario para crear un estudiante
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

//Guardar estudiante en la bd
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

//Mostrar formulario para editar un estudiante
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

//Actualizar estudiante existente
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

//Eliminar estudiante
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');



/* ====================================
   Rutas para Escuelas
   ==================================== */

//Mostrar lista de escuelas
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');

//Mostrar formulario para crear una escuela
Route::get('/schools/create', [SchoolController::class, 'create'])->name('schools.create');

//Guardar escuela en la bd
Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');

//Mostrar formulario para editar una escuela
Route::get('/schools/{school}/edit', [SchoolController::class, 'edit'])->name('schools.edit');

//Actualizar escuela existente
Route::put('/schools/{school}', [SchoolController::class, 'update'])->name('schools.update');

//Eliminar escuela
Route::delete('/schools/{school}', [SchoolController::class, 'destroy'])->name('schools.destroy');
