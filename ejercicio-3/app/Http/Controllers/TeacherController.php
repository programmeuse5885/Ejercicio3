<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Muestra una lista de todos los maestros.
     */
    public function index()
    {
        $teachers = Teacher::with('school')->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Muestra el formulario para crear un nuevo maestro.
     */
    public function create()
    {
        $schools = School::all();
        return view('teachers.create', compact('schools'));
    }

    /**
     * Guarda un nuevo maestro en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:teachers,email',
            'phone'      => 'nullable|string|max:20',
            'school_id'  => 'required|exists:schools,id',
        ]);

        Teacher::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'school_id'  => $request->school_id,
        ]);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Maestro creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un maestro existente.
     */
    public function edit(Teacher $teacher)
    {
        $schools = School::all();
        return view('teachers.edit', compact('teacher', 'schools'));
    }

    /**
     * Actualiza los datos de un maestro en la base de datos.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone'      => 'nullable|string|max:20',
            'school_id'  => 'required|exists:schools,id',
        ]);

        $teacher->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'school_id'  => $request->school_id,
        ]);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Maestro actualizado correctamente.');
    }

    /**
     * Elimina un maestro de la base de datos.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()
            ->route('teachers.index')
            ->with('success', 'Maestro eliminado correctamente.');
    }
}
