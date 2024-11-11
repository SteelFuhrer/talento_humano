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
}
