<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = DB::select("
        SELECT 
            a.*,
            (select nombredpto from departamento b where a.iddpto=b.iddpto) as nombredpto
        FROM 
            empleados a
        WHERE deleted_at is null");
    
        return view('empleados.index', compact('empleados'));

    }

    public function create()
    {
        $departamentos = Departamento::all(); // Obtener todos los departamentos
        return view('empleados.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|min:2',
            'apellido' => 'required|string|max:255|min:2',
            'apellido2' => 'nullable|string|max:255',
            'sexo' => 'required|string|',
            'direccionparticular' => 'required|string|max:255',
            'lugarnacimiento' => 'required|string|max:255',
            'telefonomovil' => 'required|string|max:12',
            'correoelectronico' => 'required|string|max:255',
            'estcivil' => 'required|string|max:50',
            'colorpelo' => 'required|string|max:50',
            'estatura' => 'required|string|max:50',
            'iddpto' => 'required|integer|exists:departamento,iddpto',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Empleado $empleado)
    {
        
        $empleado = DB::select("
        SELECT 
            a.*,
            (select nombredpto from departamento b where a.iddpto=b.iddpto) as nombredpto
        FROM 
            empleados a
        WHERE ci=?", [$empleado->ci]);

        $empleado = $empleado[0] ?? null;

        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|min:2',
            'apellido' => 'required|string|max:255|min:2',
            'apellido2' => 'nullable|string|max:255',
            'sexo' => 'required|string|',
            'direccionparticular' => 'required|string|max:255',
            'lugarnacimiento' => 'required|string|max:255',
            'telefonomovil' => 'required|string|max:12',
            'correoelectronico' => 'required|string|max:255',
            'estcivil' => 'required|string|max:50',
            'colorpelo' => 'required|string|max:50',
            'estatura' => 'required|string|max:50',
            'iddpto' => 'required|integer|exists:departamento,iddpto',
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
