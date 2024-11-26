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

    public function ausencia()
    {
        return $this->belongsTo(Ausencia::class, 'IdAusencia', 'id_ausencia');
    }

    public function jefeAutorizador()
{
    return $this->belongsTo(Empleado::class, 'cjefe');
}

}
