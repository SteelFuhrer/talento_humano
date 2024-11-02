<?php

namespace App\Http\Controllers;

use App\Models\Ausencia;
use Illuminate\Http\Request;

class AusenciaController extends Controller
{
    public function index()
    {
        $ausencias = Ausencia::all();
        return view('ausencias.index', compact('ausencias'));
    }

    public function create()
    {
        return view('ausencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoausencia' => 'required|string|max:255',
        ]);

        Ausencia::create($request->all());

        return redirect()->route('ausencias.index')->with('success', 'Ausencia creada exitosamente.');
    }

    public function show(Ausencia $ausencia)
    {
        return view('ausencias.show', compact('ausencia'));
    }

    public function edit(Ausencia $ausencia)
    {
        return view('ausencias.edit', compact('ausencia'));
    }

    public function update(Request $request, Ausencia $ausencia)
    {
        $request->validate([
           'tipoausencia' => 'required|string|max:255',
        ]);

        $ausencia->update($request->all());

        return redirect()->route('ausencias.index')->with('success', 'Ausencia actualizada exitosamente.');
    }

    public function destroy(Ausencia $ausencia)
    {
        $ausencia->delete();

        return redirect()->route('ausencias.index')->with('success', 'Ausencia eliminada exitosamente.');
}
}