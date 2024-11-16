<?php

namespace App\Http\Controllers;

use App\Models\Retraso;
use App\Models\ctiporetraso;
use App\Models\Empleado;
use Illuminate\Http\Request;

class RetrasoController extends Controller
{
    public function index()
    {
        $retrasos = Retraso::with('empleado', 'tipoRetraso')->get();
        return view('retraso.index', compact('retrasos'));
    }

    public function create()
    {
        $tiposRetraso = Ctiporetraso::all();
        $empleados = Empleado::all();
        return view('retraso.create', compact('tiposRetraso', 'empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|exists:empleados,ci',
            'idtiporetraso' => 'required|exists:ctiporetraso,idtiporetraso',
            'fecha' => 'required|date',
            'minutos' => 'required',
            'observacion' => 'nullable|string|max:255',
        ]);

        Retraso::create($request->all());
        return redirect()->route('retraso.index')->with('success', 'Retraso reportado exitosamente.');
    }

    public function edit($id)
    {
        $retraso = Retraso::findOrFail($id);
        $tiposRetraso = ctiporetraso::all();
        $empleados = Empleado::all();
        return view('retraso.edit', compact('retraso', 'tiposRetraso', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required|exists:empleados,ci',
            'idtiporetraso' => 'required|exists:ctiporetraso,idtiporetraso',
            'fecha' => 'required|date',
            'minutos' => 'required',
            'observacion' => 'nullable|string|max:255',
        ]);

        $retraso = Retraso::findOrFail($id);
        $retraso->update($request->all());
        return redirect()->route('retraso.index')->with('success', 'Retraso actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $retraso = Retraso::findOrFail($id);
        $retraso->delete();
        return redirect()->route('retraso.index')->with('success', 'Retraso eliminado exitosamente.');
    }
}

