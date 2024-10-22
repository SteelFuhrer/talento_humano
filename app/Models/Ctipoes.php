<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctipoes extends Model
{
    use HasFactory;

    protected $table = 'ctipoes';

    protected $primaryKey = 'id';  

    public $incrementing = true;   

    protected $keyType = 'int';    

    protected $fillable = ['tipoes'];
}