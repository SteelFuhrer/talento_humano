<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retraso extends Model
{
    use HasFactory;

    protected $table = 'retraso';
    protected $fillable = ['ci', 'idtiporetraso', 'fecha', 'minutos', 'observacion'];

    // Relación con empleados
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ci', 'ci');
    }

    // Relación con ctiporetraso
    public function tipoRetraso()
    {
        return $this->belongsTo(CtipoRetraso::class, 'idtiporetraso', 'idtiporetraso');
    }
}
