<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retraso extends Model
{
    use HasFactory;
     // Relación con el modelo Empleado
     public function empleado()
     {
         return $this->belongsTo(Empleado::class, 'CI', 'CI');
     }
 
     // Relación con el modelo Ctiporetraso
     public function tipoRetraso()
     {
         return $this->belongsTo(Ctiporetraso::class, 'IdTipoRetraso', 'IdTipoRetraso');
     }
}
