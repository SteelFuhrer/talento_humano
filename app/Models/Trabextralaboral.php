<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
