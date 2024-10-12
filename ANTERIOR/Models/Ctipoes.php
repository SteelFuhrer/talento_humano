<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctipoes extends Model
{
    use HasFactory;
     // Relación con el modelo Entradasalida
     public function entradasSalidas()
     {
         return $this->hasMany(Entradasalida::class, 'IdTipoES', 'IdTipoES');
     }
}
