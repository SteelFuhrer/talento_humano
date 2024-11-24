<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoAusencia;
use App\Models\Empleado;
use App\Models\Ausencia;

class AdminAusenciaController extends Controller
{
    public function index()
    {
        $empleadoAusencias = EmpleadoAusencia::all();
        return view('adminausencia.index', compact('empleadoAusencias'));
    }

    public function show($IdEmpleadoAusencia)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        return view('adminausencia.show', compact('empleadoAusencia'));
    }

    public function edit($IdEmpleadoAusencia)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleados = Empleado::all();
        $ausencias = Ausencia::all();

        return view('adminausencia.edit', compact('empleadoAusencia', 'empleados', 'ausencias'));
    }

    public function update(Request $request, $IdEmpleadoAusencia)
    {
        $request->validate([
            'estado' => 'required|boolean',
        ]);

        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleadoAusencia->update(['estado' => $request->estado]);

        return redirect()->route('adminausencia.index')->with('success', 'Solicitud de ausencia actualizada exitosamente.');
    }

    public function destroy($IdEmpleadoAusencia)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleadoAusencia->delete();

        return redirect()->route('adminausencia.index')->with('success', 'Solicitud de ausencia eliminada exitosamente.');
    }

    public function approve($IdEmpleadoAusencia)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
        $empleadoAusencia->estado = true;
        $empleadoAusencia->save();

        return redirect()->route('adminausencia.index')->with('success', 'Solicitud de ausencia aprobada exitosamente.');
    }
}
