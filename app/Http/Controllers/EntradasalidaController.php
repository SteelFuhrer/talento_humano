<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Entradasalida;
use App\Models\Ctipoes;
use Carbon\Carbon;

class EntradasalidaController extends Controller
{
    public function showAsistenciaForm()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para registrar su asistencia.');
        }
    
        $tiposAsistencia = Ctipoes::all();
        $ci = auth()->user()->empleado->ci ?? null;
    
        // Obtener el último registro de asistencia desde la base de datos
        $ultimoRegistro = Entradasalida::where('ci', $ci)
                            ->latest('fechahora')
                            ->with('tipoAsistencia') // Cargar la relación tipoAsistencia
                            ->first();
    
        return view('asistencia.asistencia', compact('tiposAsistencia', 'ultimoRegistro'));
    }

    public function registrarAsistencia(Request $request)
    {
        // Obtener el CI desde el formulario
        $ci = $request->input('ci');
        $tipoAsistencia = $request->input('tipo_asistencia');
    
        // Validar que el CI exista en la tabla empleados
        $empleado = DB::table('empleados')->where('ci', $ci)->first();
        if (!$empleado) {
            return redirect()->back()->with('error', 'El CI ingresado no corresponde a ningún empleado.');
        }
    
        // Guardar el registro de asistencia
        $registro = new Entradasalida();
        $registro->ci = $ci;
        $registro->fechahora = Carbon::now();
        $registro->idtipoes = $tipoAsistencia; // Usar directamente el ID del tipo de asistencia
        $registro->save();
    
        // Obtener el último registro actualizado del empleado
        $ultimoRegistro = Entradasalida::where('ci', $ci)
            ->latest('fechahora')
            ->first();
    
        // Mensaje de éxito
        $mensaje = 'Asistencia registrada correctamente a las ' . $registro->fechahora->format('H:i d/m/Y');
    
        return redirect()->back()->with([
            'status' => $mensaje,
            'ultimoRegistro' => $ultimoRegistro
        ]);
    }
    
}    
