<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Muestra una lista de todas las escuelas.
     */
    public function index()
    {
        $schools = School::orderBy('id', 'DESC')->get();
        return view('schools.index', compact('schools'));
    }

    /**
     * Muestra el formulario para crear una nueva escuela.
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Guarda una nueva escuela en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        School::create($request->all());

        return redirect()
            ->route('schools.index')
            ->with('success', 'Escuela creada correctamente.');
    }

    /**
     * Muestra los detalles de una escuela específica.
     */
    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    /**
     * Muestra el formulario para editar una escuela existente.
     */
    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    /**
     * Actualiza la información de una escuela en la base de datos.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $school->update($request->all());

        return redirect()
            ->route('schools.index')
            ->with('success', 'Escuela actualizada correctamente.');
    }

    /**
     * Elimina una escuela de la base de datos.
     */
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()
            ->route('schools.index')
            ->with('success', 'Escuela eliminada correctamente.');
    }
}
