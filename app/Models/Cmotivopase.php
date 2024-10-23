<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmotivopase extends Model
{
    use HasFactory;

    protected $table = 'cmotivopase';

    protected $primaryKey = 'id_motivopase';

    protected $fillable = [
        'motivopase',
    ];

    public function paseEmpleados()
    {
        return $this->hasMany(PaseEmpleado::class, 'id_motivopase');
    }


    public $timestamps = true;
}
