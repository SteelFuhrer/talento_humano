<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'apellido','apellido2', 'sexo','direccionparticular','lugarnacimiento','telefonomovil',
    'correoelectronico','estcivil','colorpelo','estatura'];

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    protected $primaryKey = 'ci';
    public $incrementing = true;
    protected $keyType = 'int';
}
