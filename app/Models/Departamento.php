<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';


    protected $primaryKey = 'iddpto';

    // Indica que la clave primaria es de tipo entero y que se autoincrementa
    public $incrementing = true;
    protected $keyType = 'int';

    // Columnas que son asignables masivamente
    protected $fillable = ['nombredpto', 'cijdpto', 'correoelectronicodpto', 'telefonodpto'];

    // Relaciones (si existen, puedes definirlas aquí)
    public function jefe()
    {
        return $this->belongsTo(Empleado::class, 'cijdpto', 'ci');
    }
}
