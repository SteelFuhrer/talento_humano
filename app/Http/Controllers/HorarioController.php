<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'nombre' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => 'required',
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}
