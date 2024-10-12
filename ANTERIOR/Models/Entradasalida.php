<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradasalida extends Model
{
    use HasFactory;
     // Relación con el modelo Empleado
     public function empleado()
     {
         return $this->belongsTo(Empleado::class, 'CI', 'CI');
     }
 
     // Relación con el modelo Ctipoes
     public function tipoES()
     {
         return $this->belongsTo(Ctipoes::class, 'IdTipoES', 'IdTipoES');
     }
}
