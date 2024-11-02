<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradasalida extends Model
{
    use HasFactory;

    protected $table = 'entradasalida';

    protected $fillable = [
        'ci',
        'fechahora',
        'idtipoes',
    ];

    // Definir la relación con el modelo Ctipoes
    public function tipoAsistencia()
    {
        return $this->belongsTo(Ctipoes::class, 'idtipoes');
    }
}
