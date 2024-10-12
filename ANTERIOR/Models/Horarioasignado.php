<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarioasignado extends Model
{
    use HasFactory;
    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'CI', 'CI');
    }

    // Relación con el modelo Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'IdHorario', 'IdHorario');
    }
}
