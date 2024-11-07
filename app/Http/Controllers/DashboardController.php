<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
       // Retrieve the total number of employees
       $totalEmpleados = Empleado::count(); 
        
       // Pass the variable to the dashboard view
       return view('dashboard.index', compact('totalEmpleados'));
    
    }
}
