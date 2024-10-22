<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'sexo' => 'required|string|',
            'direccionparticular' => 'required|string|max:255',
            'lugarnacimiento' => 'required|string|max:255',
            'telefonomovil' => 'required|string|max:12',
            'correoelectronico' => 'required|string|max:255',
            'estcivil' => 'required|string|max:50',
            'colorpelo' => 'required|string|max:50',
            'estatura' => 'required|string|max:50',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'sexo' => 'required|string|',
            'direccionparticular' => 'required|string|max:255',
            'lugarnacimiento' => 'required|string|max:255',
            'telefonomovil' => 'required|string|max:12',
            'correoelectronico' => 'required|string|max:255',
            'estcivil' => 'required|string|max:50',
            'colorpelo' => 'required|string|max:50',
            'estatura' => 'required|string|max:50',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
