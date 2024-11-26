<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoAusencia;
use App\Models\Empleado;
use App\Models\Ausencia;
use Illuminate\Support\Facades\DB;

class AdminAusenciaController extends Controller
{
    public function index()
    {
        $empleadoAusencias = DB::table('empleadoausencia as a')
            ->join('empleados as b', 'a.ci', '=', 'b.ci')
            ->join('ausencias as c', 'a.IdAusencia', '=', 'c.id_ausencia')
            ->join('departamento as d', 'b.iddpto', '=', 'd.iddpto')
            ->join('empleados as e', 'd.cijdpto', '=', 'e.ci')
            ->select(
                DB::raw("CONCAT(b.nombre, ' ', b.apellido) as nombres"),
                'd.nombredpto',
                'c.tipoausencia',
                'a.FInicio',
                'a.FFin',
                'a.estado',
                'a.IdEmpleadoAusencia',
                DB::raw("CONCAT(e.nombre, ' ', e.apellido) as jefe"),
                DB::raw("(SELECT CONCAT(f.nombre, ' ', f.apellido) FROM empleados f WHERE f.ci = a.CJefe) as autoriza")
            )
            ->get();

        return view('adminausencia.index', compact('empleadoAusencias'));
    }

    public function update(Request $request, $IdEmpleadoAusencia, $estado)
    {
        $empleadoAusencia = EmpleadoAusencia::findOrFail($IdEmpleadoAusencia);
    
        $empleadoAusencia->update([
            'estado' => $estado,
            'CJefe' => auth()->user()->ci,
        ]);
    
        return redirect()->route('adminausencia.index')->with('success', 'Solicitud de ausencia actualizada exitosamente.');
    }
    
}
