<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\EmpleadoAusencia;
use App\Models\Retraso;

class DashboardController extends Controller
{
    public function index()
    {
        // Traemos el horario del empleado logueado
        $ci = auth()->user()->ci; // CI del usuario logueado
        $horario = DB::selectOne("
            SELECT CONCAT('Horario asignado: ', c.nombre, ' de ', 
                          DATE_FORMAT(c.hora_entrada, '%H:%i'), ' a ', 
                          DATE_FORMAT(c.hora_salida, '%H:%i')) as horario
            FROM users a
            INNER JOIN horarioasignado b ON a.ci = b.ci
            INNER JOIN horarios c ON b.id_horario = c.id
            WHERE a.ci = ?
        ", [$ci]);

        // Si no se encuentra horario, asignar el mensaje predeterminado
        $mensaje = $horario ? $horario->horario : "Sin horario asignado";

        // Obtener estadísticas para el dashboard
        $totalEmpleados = Empleado::count();
        $totalDepartamentos = Departamento::count();
        $totalEmpleadoausencia = EmpleadoAusencia::count();
        $totalRetraso = Retraso::count();
        
        // Pasar las variables a la vista del dashboard
        return view('dashboard.index', compact(
            'totalEmpleados', 
            'totalDepartamentos', 
            'totalEmpleadoausencia', 
            'totalRetraso', 
            'mensaje'
        ));
    }
}