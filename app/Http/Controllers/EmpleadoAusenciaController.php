<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoAusencia;
use App\Models\Empleado;
use App\Models\Ausencia;

class EmpleadoAusenciaController extends Controller
{
    public function index()
    {
        $empleadoAusencias = EmpleadoAusencia::all();
        return view('empleadoausencia.index', compact('empleadoAusencias'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        $ausencias = Ausencia::all();

        return view('empleadoausencia.empleado.create', compact('empleados', 'ausencias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CI' => 'required|integer',
            'IdAusencia' => 'required|integer',
            'FInicio' => 'required|date',
            'FFin' => 'required|date',
            'CJefe' => 'required|integer',
            // Si `estado` es booleano, lo añadimos a la validación:
            'estado' => 'nullable|boolean',
        ]);

        EmpleadoAusencia::create($request->all());

        return redirect()->route('empleadoausencia.index')->with('success', 'Ausencia de empleado creada exitosamente.');
    }

    public function edit($IdEmpleadoAusencia)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleados = Empleado::all();
        $ausencias = Ausencia::all();

        return view('empleadoausencia.edit', compact('empleadoAusencia', 'empleados', 'ausencias'));
    }

    public function update(Request $request, $IdEmpleadoAusencia)
    {
        $request->validate([
            'CI' => 'required|integer',
            'IdAusencia' => 'required|integer',
            'FInicio' => 'required|date',
            'FFin' => 'required|date',
            'CJefe' => 'required|integer',
            // Añadir validación para el campo `estado` como booleano
            'estado' => 'required|boolean',
        ]);

        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleadoAusencia->update($request->all());

        return redirect()->route('empleadoausencia.index')->with('success', 'Ausencia de empleado actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($id);
        $empleadoAusencia->delete();

        return redirect()->route('empleadoausencia.index')->with('success', 'Ausencia de empleado eliminada exitosamente.');
    }

    public function approve($id)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($id);

        // Ahora el estado se manejará como booleano, no como cadena de texto.
        $empleadoAusencia->estado = true; // O false si lo desearas para "desaprobar"
        $empleadoAusencia->save();

        return redirect()->route('empleadoausencia.index')->with('success', 'Solicitud de ausencia aprobada exitosamente.');
    }
}

