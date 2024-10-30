<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = DB::select("
        SELECT 
            a.iddpto,
            a.nombredpto,
            (SELECT concat(nombre, ' ', apellido) FROM empleados b WHERE a.cijdpto = b.ci) AS jefe,
            a.correoelectronicodpto,
            a.telefonodpto
        FROM 
            departamento a");
    
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
            'nombredpto' => 'required|string|max:255|min:3',
            'cijdpto' => 'required|integer|exists:empleados,ci', // Validación para asegurar que el jefe existe
            'correoelectronicodpto' => 'required|string|email|max:255',
            'telefonodpto' => 'required|string|max:12',
        ]);

        Departamento::create($request->all());

        return redirect()->route('departamento.index')->with('success', 'Departamento creado exitosamente.');
    }

    public function show(Departamento $departamento)
    {
   
    $jefe = DB::table('empleados as a')
        ->select(DB::raw("concat(a.nombre, ' ', a.apellido) as nombre"))
        ->join('departamento as b', 'a.ci', '=', 'b.cijdpto')
        ->where('b.iddpto', $departamento->iddpto)
        ->first();

    return view('departamento.show', compact('departamento', 'jefe'));
    }

    public function edit(Departamento $departamento)
    {
        $empleados = Empleado::all(); // Obtener todos los empleados para el campo select en edición
        return view('departamento.edit', compact('departamento', 'empleados'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombredpto' => 'required|string|max:255|min:3',
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
