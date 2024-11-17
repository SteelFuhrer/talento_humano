<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ausencia extends Model
{
    protected $primaryKey = 'id_ausencia';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $fillable = ['tipoausencia'];

    public function ausenciasEmpleado()
    {
        return $this->hasMany(EmpleadoAusencia::class, 'IdAusencia', 'IdAusencia');
    }

}
