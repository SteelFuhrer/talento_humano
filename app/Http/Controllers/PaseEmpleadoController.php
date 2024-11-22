<?php

namespace App\Http\Controllers;

use App\Models\PaseEmpleado;
use Illuminate\Http\Request;
use App\Models\Cmotivopase;
use App\Models\Empleado;

class PaseEmpleadoController extends Controller
{
    public function index()
    {
        $pases = PaseEmpleado::all();
        $empleados = Empleado::all();  // Aquí ya tienes todos los empleados
        $motivospase = Cmotivopase::all();
    
        return view('paseempleado.index', compact('pases', 'motivospase', 'empleados'));
    }

    public function create()
    {
        // Obtener todos los empleados
        $empleados = Empleado::all();
        $motivospase = Cmotivopase::all(); // Si es necesario para el combobox de "Motivo del Pase"
    
        // Retornar la vista con los empleados y otros datos necesarios
        return view('paseempleado.create', compact('empleados', 'motivospase'));
    }
    

    // Almacenar un nuevo pase
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'ci' => 'required|integer',
            'fecha' => 'required|date',
            'hsalida' => 'required|date',
            'hentrada' => 'required|date',
            'lugar' => 'required|string|max:255',
            'id_motivopase' => 'required|integer|exists:cmotivopase,id_motivopase', // Verifica que el ID exista
            'cijefe' => 'required|integer',
        ]);

        // Crear el paseempleado
        PaseEmpleado::create($request->all());

        // Redirigir a la vista principal después de almacenar
        return redirect()->route('paseempleado.index')->with('success', 'Pase creado exitosamente.');
    }

    public function edit($id)
    {
        // Obtener el paseempleado que se va a editar
        $paseempleado = PaseEmpleado::findOrFail($id);
        
        // Obtener todos los empleados y los motivos de pase
        $empleados = Empleado::all();
        $motivospase = Cmotivopase::all(); 
    
        // Retornar la vista con los datos necesarios
        return view('paseempleado.edit', compact('paseempleado', 'empleados', 'motivospase'));
    }
    

    // Actualizar un pase existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required|integer',
            'fecha' => 'required|date',
            'hsalida' => 'required|date',
            'hentrada' => 'required|date',
            'lugar' => 'required|string|max:255',
            'id_motivopase' => 'required|integer|exists:cmotivopase,id_motivopase', // Verifica que el ID exista
            'cijefe' => 'required|integer',
        ]);

        // Actualizar el paseempleado
        $paseempleado = PaseEmpleado::findOrFail($id);
        $paseempleado->update($request->all());

        return redirect()->route('paseempleado.index')->with('success', 'Pase actualizado exitosamente.');
    }

    // Eliminar un pase
    public function destroy($id)
    {
        $paseempleado = PaseEmpleado::findOrFail($id);
        $paseempleado->delete();

        return redirect()->route('paseempleado.index')->with('success', 'Pase eliminado exitosamente.');
    }

    // Mostrar un pase específico
    public function show($id)
    {
        $paseempleado = PaseEmpleado::findOrFail($id);
        $motivospase = Cmotivopase::all();
        return view('paseempleado.show', compact('paseempleado'));
    }
}
