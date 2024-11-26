<?php

namespace App\Http\Controllers;

use App\Models\HorarioAsignado;
use App\Models\Empleado;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioAsignadoController extends Controller
{
    public function index()
    {
        $horarioasignado = HorarioAsignado::with(['empleado', 'horario'])->get();
        return view('horarioasignado.index', compact('horarioasignado'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        $horarios = Horario::all();
        return view('horarioasignado.create', compact('empleados', 'horarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|exists:empleados,ci',
            'id_horario' => 'required|exists:horarios,id', // Cambiado a 'id_horario'
            'FAsignacion' => 'required|date',
            'CausaHorario' => 'required|string|max:255',
        ]);

        HorarioAsignado::create($request->all());

        return redirect()->route('horarioasignado.index')->with('success', 'Horario asignado creado correctamente');
    }

    public function edit(HorarioAsignado $horarioasignado)
    {
        $empleados = Empleado::all();
        $horarios = Horario::all();
        return view('horarioasignado.edit', compact('horarioasignado', 'empleados', 'horarios'));
    }

    public function update(Request $request, HorarioAsignado $horarioasignado)
    {
        $request->validate([
            'ci' => 'required|exists:empleados,ci', // Cambiado a 'ci'
            'id_horario' => 'required|exists:horarios,id', // Cambiado a 'id_horario'
            'FAsignacion' => 'required|date',
            'CausaHorario' => 'required|string|max:255',
        ]);

        $horarioasignado->update($request->all());

        return redirect()->route('horarioasignado.index')->with('success', 'Horario asignado actualizado correctamente');
    }

    public function destroy(HorarioAsignado $horarioasignado)
    {
        $horarioasignado->delete();
        return redirect()->route('horarioasignado.index')->with('success', 'Horario asignado eliminado correctamente');
    }
}
