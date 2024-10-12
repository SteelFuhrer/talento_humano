<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmotivopase extends Model
{
    use HasFactory;
     // Relación con el modelo Paseempleado
     public function pasesEmpleado()
     {
         return $this->hasMany(Paseempleado::class, 'IdMotivoPase', 'IdMotivoPase');
     }
}
