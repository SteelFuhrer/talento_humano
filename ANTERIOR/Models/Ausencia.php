<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ausencia extends Model
{
    use HasFactory;
    // Relación con el modelo Empleadoausencia
    public function empleadoAusencias()
    {
        return $this->hasMany(Empleadoausencia::class, 'IdAusencia', 'IdAusencia');
    }
}
