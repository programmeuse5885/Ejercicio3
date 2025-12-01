<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Muestra la lista de estudiantes.
     */
    public function index()
    {
        $students = Student::with('school')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Muestra el formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        $schools = School::all(); // Para seleccionar la escuela del estudiante
        return view('students.create', compact('schools'));
    }

    /**
     * Guarda un nuevo estudiante en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'school_id'  => 'nullable|exists:schools,id',
        ]);

        Student::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'school_id'  => $request->school_id,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Nuevo estudiante creado correctamente.');
    }

    /**
     * Muestra la información de un estudiante.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Muestra el formulario para editar un estudiante.
     */
    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    /**
     * Actualiza los datos de un estudiante.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'school_id'  => 'nullable|exists:schools,id',
        ]);

        $student->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'school_id'  => $request->school_id,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Elimina un estudiante de la base de datos.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
