<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctiporetraso extends Model
{
    use HasFactory;
    // Relación con el modelo Retraso
    public function retrasos()
    {
        return $this->hasMany(Retraso::class, 'IdTipoRetraso', 'IdTipoRetraso');
    }
}
