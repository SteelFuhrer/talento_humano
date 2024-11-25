<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\EmpleadoAusencia;
use App\Models\Retraso;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener los datos necesarios
        $totalEmpleados = Empleado::count();
        $totalDepartamentos = Departamento::count();
        $totalEmpleadoausencia = EmpleadoAusencia::count();
        $totalRetraso = Retraso::count();

        // Pasar todas las variables necesarias a la vista
        return view('dashboard.index', compact('totalEmpleados', 'totalDepartamentos', 'totalEmpleadoausencia', 'totalRetraso'));
    }
}