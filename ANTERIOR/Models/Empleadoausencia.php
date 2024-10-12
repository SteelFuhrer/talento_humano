<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleadoausencia extends Model
{
    use HasFactory;
    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'CI', 'CI');
    }

    // Relación con el modelo Ausencia
    public function ausencia()
    {
        return $this->belongsTo(Ausencia::class, 'IdAusencia', 'IdAusencia');
    }
}
