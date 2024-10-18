<?php

namespace App\Http\Controllers;

use App\Models\Ctiporetraso;
use Illuminate\Http\Request;

class CtiporetrasoController extends Controller
{
    public function index()
    {
        $tiposDeRetraso = Ctiporetraso::all();
        return view('ctiporetraso.index', compact('tiposDeRetraso'));
    }

    public function create()
    {
        // Contar el número de registros existentes
        $numero = Ctiporetraso::count() + 1;

        // Pasar la variable $numero a la vista
        return view('ctiporetraso.create', compact('numero'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoderetraso' => 'required|string|max:255',
            // No validar 'numero' ya que no es un campo de la base de datos
        ]);

        // Crear el registro sin incluir 'idtiporetraso'
        Ctiporetraso::create($request->only(['tipoderetraso']));

        return redirect()->route('ctiporetraso.index')->with('success', 'Tipo de retraso creado exitosamente.');
    }

    public function show(Ctiporetraso $ctiporetraso)
    {
        return view('ctiporetraso.show', compact('ctiporetraso'));
    }

    public function edit($idtiporetraso)
    {
        // Buscar el tipo de retraso por ID
        $tipo = Ctiporetraso::findOrFail($idtiporetraso);

        // Obtener el número de registro basado en el ID del tipo de retraso
        $numero = Ctiporetraso::where('idtiporetraso', '<=', $idtiporetraso)->count();

        // Pasar el objeto $tipo y el número a la vista
        return view('ctiporetraso.edit', compact('tipo', 'numero'));
    }

    public function update(Request $request, $idtiporetraso)
    {
        $request->validate([
            'tipoderetraso' => 'required|string|max:255',
        ]);

        // Buscar el tipo de retraso por ID
        $tipo = Ctiporetraso::findOrFail($idtiporetraso);

        // Actualizar el tipo de retraso con los datos del formulario
        $tipo->update($request->only(['tipoderetraso']));

        return redirect()->route('ctiporetraso.index')->with('success', 'Tipo de retraso actualizado exitosamente.');
    }

    public function destroy($idtiporetraso)
    {
        // Buscar el tipo de retraso por ID y eliminarlo
        $tipo = Ctiporetraso::findOrFail($idtiporetraso);
        $tipo->delete();

        return redirect()->route('ctiporetraso.index')->with('success', 'Tipo de retraso eliminado exitosamente.');
    }
}
