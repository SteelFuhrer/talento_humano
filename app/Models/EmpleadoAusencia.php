<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoAusencia extends Model
{
    protected $table = 'empleadoausencia';
    protected $primaryKey = 'IdEmpleadoAusencia';
    public $timestamps = true;

    protected $fillable = [
        'CI',
        'IdAusencia',
        'FInicio',
        'FFin',
        'CJefe',
        'estado'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'CI', 'ci');
    }

    // Relación con el modelo Ausencia
    public function ausencia()
    {
        return $this->belongsTo(Ausencia::class, 'IdAusencia', 'id_ausencia');
    }
}
