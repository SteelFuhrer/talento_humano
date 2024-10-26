<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
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
        return view('departamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombredpto' => 'required|string|max:255',
            'cijdpto' => 'required|integer', 
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
        return view('departamento.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombredpto' => 'required|string|max:255',
            'cijdpto' => 'required|integer',
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
