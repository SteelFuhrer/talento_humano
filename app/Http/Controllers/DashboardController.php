<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\EmpleadoAusencia;
use App\Models\Retraso;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Fecha actual
        $hoy = Carbon::today();

        // Datos generales
        $totales = [
            'empleados' => Empleado::count(),
            'departamentos' => Departamento::count(),
            'ausenciasHoy' => $this->contarRegistrosPorFecha(EmpleadoAusencia::class, $hoy),
            'retrasosHoy' => $this->contarRegistrosPorFecha(Retraso::class, $hoy),
        ];

        // Pasar datos al dashboard
        return view('dashboard.index', compact('totales'));
    }

    /**
     * Contar registros por fecha.
     *
     * @param string $modelo
     * @param \Carbon\Carbon $fecha
     * @return int
     */
    private function contarRegistrosPorFecha($modelo, $fecha)
    {
        return $modelo::whereDate('created_at', $fecha)->count();
    }
}
