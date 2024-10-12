<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
     // Relación con el modelo Horarioasignado
     public function horariosAsignados()
     {
         return $this->hasMany(Horarioasignado::class, 'IdHorario', 'IdHorario');
     }
}
