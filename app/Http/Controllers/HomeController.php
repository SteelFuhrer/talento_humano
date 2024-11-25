<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\EmpleadoAusencia;
use App\Models\Retraso;
use Illuminate\Http\Request;
use Carbon\Carbon; // Para manejar fechas

class HomeController extends Controller
{
    /**
     * Middleware de autenticación.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el dashboard.
     */
    public function index()
    {
        // Obtener la fecha actual
        $hoy = Carbon::today(); // Fecha actual en formato YYYY-MM-DD

        // Obtener los datos necesarios
        $totalEmpleados = Empleado::count();
        $totalDepartamentos = Departamento::count();

        // Filtrar ausencias del día de hoy
        $totalEmpleadoausencia = EmpleadoAusencia::whereDate('fecha', $hoy)->count();

        // Filtrar retrasos del día de hoy
        $totalRetraso = Retraso::whereDate('fecha', $hoy)->count();

        // Pasar las variables a la vista
        return view('dashboard.index', compact(
            'totalEmpleados',
            'totalDepartamentos',
            'totalEmpleadoausencia',
            'totalRetraso'
        ));
    }
}
