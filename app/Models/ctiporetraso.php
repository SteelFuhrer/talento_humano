<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ctiporetraso extends Model
{
    protected $table = 'ctiporetraso'; // Nombre de la tabla

    protected $primaryKey = 'idtiporetraso'; // Nombre de la clave primaria

    public $incrementing = false; // Si el campo no es auto-incremental, ajusta esto

    protected $keyType = 'string'; // Ajusta si la clave primaria es un string en lugar de un entero

    protected $fillable = [
        'idtiporetraso', 
        'tipoderetraso', // Agrega otros campos que sean rellenables
    ];
}
