<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\EmpleadoAusencia;
use App\Models\Retraso;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el total de empleados
        $totalEmpleados = Empleado::count(); 
        
        // Obtener el total de departamentos
        $totalDepartamentos = Departamento::count();

        $totalEmpleadoausencia = EmpleadoAusencia::count();

        $totalRetraso = Retraso::count();
        
        // Pasar las variables a la vista del dashboard
        return view('dashboard.index', compact('totalEmpleados', 'totalDepartamentos','totalEmpleadoausencia', 'totalRetraso' ));
    }
}