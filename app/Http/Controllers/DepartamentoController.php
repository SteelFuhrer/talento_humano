<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.index', compact('departamentos'));
    }

    public function create()
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select
        return view('departamento.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombredpto' => 'required|string|max:255',
            'cijdpto' => 'required|integer|exists:empleados,ci', // Validación para asegurar que el jefe existe
            'correoelectronicodpto' => 'required|string|email|max:255',
            'telefonodpto' => 'required|string|max:12',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamento.index')->with('success', 'Departamento creado exitosamente.');
    }

    public function show(Departamento $departamento)
    {
        return view('departamento.show', compact('departamento'));
    }

    public function edit(Departamento $departamento)
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select en edición
        return view('departamento.edit', compact('departamento', 'empleados'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombredpto' => 'required|string|max:255',
            'cijdpto' => 'required|integer|exists:empleados,ci',
            'correoelectronicodpto' => 'required|string|email|max:255',
            'telefonodpto' => 'required|string|max:12',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamento.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamento.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}
