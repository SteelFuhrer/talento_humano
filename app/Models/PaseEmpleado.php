<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaseEmpleado extends Model
{
    use HasFactory;
    protected $table='paseempleado';
    protected $primaryKey='idpaseempleado';
    public $timestamp=true;

    protected $fillable=[
        'ci',
        'fecha',
        'hsalida',
        'hentrada',
        'lugar',
        'id_motivopase',
        'cijefe',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ci', 'ci');
    }
    public function jefe()
    {
        return $this->belongsTo(Empleado::class, 'cijefe', 'ci');
    }
}
