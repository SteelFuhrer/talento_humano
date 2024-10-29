<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'iddpto';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nombredpto', 'cijdpto', 'correoelectronicodpto', 'telefonodpto'];

    // Relación para obtener el jefe del departamento
    public function jefe()
    {
        return $this->belongsTo(Empleado::class, 'cijdpto', 'ci');
    }
}

