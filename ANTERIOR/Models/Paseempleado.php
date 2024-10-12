<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paseempleado extends Model
{
    use HasFactory;
     // Relación con el modelo Empleado
     public function empleado()
     {
         return $this->belongsTo(Empleado::class, 'CI', 'CI');
     }
 
     // Relación con el modelo Cmotivopase
     public function motivoPase()
     {
         return $this->belongsTo(Cmotivopase::class, 'IdMotivoPase', 'IdMotivoPase');
     }
}
