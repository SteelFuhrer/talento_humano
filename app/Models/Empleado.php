<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'apellido','apellido2', 'sexo','direccionparticular','lugarnacimiento','telefonomovil',
    'correoelectronico','estcivil','colorpelo','estatura', 'iddpto'];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    protected $primaryKey = 'ci';
    public $incrementing = true;
    protected $keyType = 'int';

    public function trabextralaborales()
    {
        return $this->hasMany(Trabextralaboral::class, 'ci', 'ci');
    }

    // Relación para obtener el jefe del departamento
    public function departamento()
    {
       return $this->belongsTo(Departamento::class, 'iddpto', 'iddpto');
    }

    public function empleadoausencia(){
        return $this->hasMany(EmpleadoAusencia::class, 'CI', 'CI');
    }

    public function asistencias()
    {
        return $this->hasMany(EntradaSalida::class, 'ci', 'ci');
    }

    public function jefe()
    {
        return $this->hasMany(EmpleadoAusencia::class, 'cjefe');
    }

    public function horarioAsignado()
    {
        return $this->hasOne(HorarioAsignado::class, 'ci', 'ci');
    }

}
