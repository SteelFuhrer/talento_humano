<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Empleado;
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
        $ultimoRegistro = Entradasalida::with('tipoAsistencia')
        ->where('ci', $ci)
        ->latest('fechahora')
        ->first();

        // Fecha de hoy
        $fechaHoy = Carbon::today();

        // Registros del día actual
        $asistenciasHoy = Entradasalida::with('tipoAsistencia')
            ->where('ci', $ci)
            ->whereDate('fechahora', $fechaHoy)
            ->get();
   
        return view('asistencia.asistencia', compact('tiposAsistencia', 'ultimoRegistro', 'asistenciasHoy'));
    }

    public function registrarAsistencia(Request $request)
    {
        $ci = $request->input('ci');
        $tipoAsistencia = $request->input('tipo_asistencia');
    
        $empleado = DB::table('empleados')->where('ci', $ci)->first();
        if (!$empleado) {
            return redirect()->back()->with('error', 'El CI ingresado no corresponde a ningún empleado.');
        }

        // Obtener el último registro de asistencia
        $ultimoRegistro = Entradasalida::where('ci', $ci)
        ->latest('fechahora')
        ->first();

        // Verificar si el tipo de asistencia es el mismo que el del último registro
        if ($ultimoRegistro && $ultimoRegistro->idtipoes == $tipoAsistencia) {
        return redirect()->back()->with('error', 'No puedes registrar el mismo tipo de asistencia consecutivo.');
        }
    
        $registro = new Entradasalida();
        $registro->ci = $ci;
        $registro->fechahora = Carbon::now();
        $registro->idtipoes = $tipoAsistencia; 
        $registro->save();
    
        $ultimoRegistro = Entradasalida::where('ci', $ci)
            ->latest('fechahora')
            ->first();
    
        $mensaje = 'Asistencia registrada correctamente a las ' . $registro->fechahora->format('H:i d/m/Y');
    
        return redirect()->back()->with(['success' => $mensaje,'ultimoRegistro' => $ultimoRegistro]);
    }

    public function buscarPorFecha(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para buscar registros.');
        }

        $ci = auth()->user()->empleado->ci ?? null;

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin') ?? $fechaInicio;

        $asistencias = Entradasalida::with('tipoAsistencia')
            ->where('ci', $ci)
            ->whereBetween('fechahora', [
                Carbon::parse($fechaInicio)->startOfDay(),
                Carbon::parse($fechaFin)->endOfDay()
            ])
            ->orderBy('fechahora', 'asc')
            ->get();

        return view('asistencia.resultados', compact('asistencias', 'fechaInicio', 'fechaFin'));
    }

    public function verAsistenciasHoy()
    {
        $hoy = Carbon::now()->toDateString();

        // Obtener todos los empleados con su departamento
        $empleados = Empleado::with('departamento')->get();

        // Obtener los registros de asistencia del día actual
        $registrosHoy = EntradaSalida::whereDate('fechahora', $hoy)
            ->with(['empleado', 'tipoAsistencia'])
            ->orderBy('fechahora')
            ->get()
            ->keyBy('ci'); // Agrupamos por 'ci'

        // Construir la colección final para la vista
        $datos = $empleados->map(function ($empleado) use ($registrosHoy) {
            $registro = $registrosHoy->get($empleado->ci);

            return [
                'nombre' => $empleado->nombre,
                'apellido' => $empleado->apellido,
                'departamento' => $empleado->departamento->nombredpto ?? 'Sin asignar',
                'tipo_asistencia' => $registro->tipoAsistencia->tipoes ?? 'Sin registro de asistencia',
                'hora' => $registro ? $registro->fechahora->format('H:i:s') : 'Sin registro de asistencia',
                'fecha' => $registro ? $registro->fechahora->toDateString() : Carbon::now()->toDateString(),
            ];
        });

        return view('asistencia.reporte', compact('datos'));
    }

    public function buscarAsistencias(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
    
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
    
        // Consultar registros de asistencia dentro del rango
        $registros = EntradaSalida::whereBetween('fechahora', ["$fechaInicio 00:00:00", "$fechaFin 23:59:59"])
            ->with(['empleado.departamento', 'tipoAsistencia'])
            ->orderBy('fechahora')
            ->get();
    
        // Formatear datos para la vista
        $datos = $registros->map(function ($registro) {
            return [
                'nombre' => $registro->empleado->nombre,
                'apellido' => $registro->empleado->apellido,
                'departamento' => $registro->empleado->departamento->nombredpto ?? 'Sin asignar',
                'tipo_asistencia' => $registro->tipoAsistencia->tipoes ?? 'Sin registro de asistencia',
                'hora' => $registro->fechahora->format('H:i:s'),
                'fecha' => $registro->fechahora->toDateString(),
            ];
        });
    
        return view('asistencia.resultadosGroup', compact('datos', 'fechaInicio', 'fechaFin'));
    }
    

}    
