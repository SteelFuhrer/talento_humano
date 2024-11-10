<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioAsignado extends Model
{
    use HasFactory;

    protected $table = 'horarioasignado';
    protected $fillable = ['ci', 'id_horario', 'FAsignacion', 'CausaHorario'];

    // Relaciones
    public function empleado()
{
    return $this->belongsTo(Empleado::class, 'ci', 'ci');
}

public function horario()
{
    return $this->belongsTo(Horario::class, 'id_horario', 'id');
}
}