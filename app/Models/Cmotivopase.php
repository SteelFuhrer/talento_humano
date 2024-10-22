<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmotivopase extends Model
{
    use HasFactory;

    protected $table = 'cmotivopase';

    protected $primaryKey = 'IdMotivoPase';

    protected $fillable = [
        'MotivoPase',
    ];

    public function paseEmpleados()
    {
        return $this->hasMany(PaseEmpleado::class, 'IdMotivoPase');
    }


    public $timestamps = true;
}