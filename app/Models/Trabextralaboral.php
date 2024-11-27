<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trabextralaboral extends Model
{
    use HasFactory;

    protected $table = 'trabextralaboral';
    protected $primaryKey = 'idtrabextralaboral';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['ci', 'descripciontrab', 'hini', 'hfin'];


    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ci', 'ci');
    }

    public function getHorasExtrasAttribute()
    {
        $inicio = Carbon::parse($this->hini);
        $fin = Carbon::parse($this->hfin);

        return $fin->diff($inicio)->format('%H:%I:%S');
    }
}
