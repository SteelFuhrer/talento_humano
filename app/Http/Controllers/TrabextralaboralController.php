<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabextralaboral;
use App\Models\Empleado;

class TrabextralaboralController extends Controller
{
    public function index()
    {
        $trabextralaborales= Trabextralaboral::with('empleado.departamento')->get();
        return view('trabextralaboral.index', compact('trabextralaborales'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('trabextralaboral.create',compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|integer|exists:empleados,ci',
            'descripciontrab' => 'required|string|max:255|min:3',
            'hini' => 'required',
            'hfin' => 'required|after:hini',
        ]);

        Trabextralaboral::create($request->all());

        return redirect()->route('trabextralaboral.index')->with('success', 'Trabajo Extra Laboral creado exitosamente.');
    }

    public function destroy(Trabextralaboral $trabextralaboral)
    {
        $trabextralaboral->delete();

        return redirect()->route('trabextralaboral.index')->with('success', 'Trabajo Extra Laboral eliminado exitosamente.');
    }

    public function edit(Trabextralaboral $trabextralaboral)
    {
        return view('trabextralaboral.edit', compact('trabextralaboral'));
    }

    public function update(Request $request, Trabextralaboral $trabextralaboral)
    {
        $request->validate([
            'descripciontrab' => 'required|string|max:255|min:5',
        ]);

        $trabextralaboral->update($request->all());

        return redirect()->route('trabextralaboral.index')->with('success', 'Trabajo Extralaboral actualizado exitosamente.');
    }

}
