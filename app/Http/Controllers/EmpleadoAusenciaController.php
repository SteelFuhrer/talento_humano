<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoAusencia;
use Illuminate\Support\Facades\Auth;
use App\Models\Empleado;
use App\Models\Ausencia;

class EmpleadoAusenciaController extends Controller
{
    public function index()
    {
        $userCi = Auth::user()->ci;
        
        $empleadoAusencias = EmpleadoAusencia::whereHas('empleado', function($query) use ($userCi) {
            $query->where('ci', $userCi);
        })->get();
        
        return view('empleadoausencia.index', compact('empleadoAusencias'));
    }


    public function create()
    {
        $user = auth()->user();
        $empleado = $user->empleado;
        $jefe = $empleado->departamento->jefe ?? null;
       
        $ausencias = Ausencia::all();

        return view('empleadoausencia.create', compact('ausencias', 'jefe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CI' => 'required|integer',
            'IdAusencia' => 'required|integer',
            'FInicio' => 'required|date',
            'FFin' => 'required|date',
            'CJefe' => 'required|integer',
        ]);

        if ($request->FFin < $request->FInicio) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'La fecha de fin no puede ser anterior a la fecha de inicio.');
        }
    

        if ((int)$request->CJefe === 0) {
            return redirect()->back()->withInput()->with('error', 'Actualmente no pertenece a ningún departamento, favor solicitar asignación');
        }

        $request->merge(['estado' => 0]); //0 es pendiente, 1 es aprobado y 2 es rechazado

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
        $empleadoAusencia->estado = true;
        $empleadoAusencia->save();

        return redirect()->route('empleadoausencia.index')->with('success', 'Solicitud de ausencia aprobada exitosamente.');
    }
}
