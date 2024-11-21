<?php

namespace App\Http\Controllers;

use App\Models\PaseEmpleado;
use Illuminate\Http\Request;

class PaseEmpleadoController extends Controller
{
    // Mostrar todos los registros de paseempleado
    public function index()
    {
        $pases = PaseEmpleado::all();
        return view('paseempleado.index', compact('pases'));
    }

    // Mostrar el formulario para crear un nuevo pase
    public function create()
    {
        return view('paseempleado.create');
    }

    // Almacenar un nuevo pase
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'ci' => 'required|integer',
            'fecha' => 'required|date',
            'hsalida' => 'required|date',
            'hentrada' => 'required|date',
            'lugar' => 'required|string|max:255',
            'id_motivopase' => 'required|integer|exists:cmotivopase,id_motivopase', // Verifica que el ID exista
            'cijefe' => 'required|integer',
        ]);

        // Crear el paseempleado
        PaseEmpleado::create($request->all());

        // Redirigir a la vista principal después de almacenar
        return redirect()->route('paseempleado.index')->with('success', 'Pase creado exitosamente.');
    }

    // Mostrar el formulario para editar un pase
    public function edit($id)
    {
        $paseempleado = PaseEmpleado::findOrFail($id);
        return view('paseempleado.edit', compact('paseempleado'));
    }

    // Actualizar un pase existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required|integer',
            'fecha' => 'required|date',
            'hsalida' => 'required|date',
            'hentrada' => 'required|date',
            'lugar' => 'required|string|max:255',
            'id_motivopase' => 'required|integer|exists:cmotivopase,id_motivopase', // Verifica que el ID exista
            'cijefe' => 'required|integer',
        ]);

        // Actualizar el paseempleado
        $paseempleado = PaseEmpleado::findOrFail($id);
        $paseempleado->update($request->all());

        return redirect()->route('paseempleado.index')->with('success', 'Pase actualizado exitosamente.');
    }

    // Eliminar un pase
    public function destroy($id)
    {
        $paseempleado = PaseEmpleado::findOrFail($id);
        $paseempleado->delete();

        return redirect()->route('paseempleado.index')->with('success', 'Pase eliminado exitosamente.');
    }

    // Mostrar un pase específico
    public function show($id)
    {
        $paseempleado = PaseEmpleado::findOrFail($id);
        return view('paseempleado.show', compact('paseempleado'));
    }
}
