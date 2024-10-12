<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

   // Relación con el modelo Departamento
   public function departamento()
   {
       return $this->belongsTo(Departamento::class, 'IdDpto', 'CijDpto');
   }

   // Relación con el modelo Horarioasignado
   public function horariosAsignados()
   {
       return $this->hasMany(Horarioasignado::class, 'CI', 'CI');
   }

   // Relación con el modelo Entradasalida
   public function entradasSalidas()
   {
       return $this->hasMany(Entradasalida::class, 'CI', 'CI');
   }

   // Relación con el modelo Empleadoausencia
   public function ausencias()
   {
       return $this->hasMany(Empleadoausencia::class, 'CI', 'CI');
   }

   // Relación con el modelo Trabextraboral
   public function trabajosExtra()
   {
       return $this->hasMany(Trabextraboral::class, 'CI', 'CI');
   }

   // Relación con el modelo Paseempleado
   public function pasesEmpleado()
   {
       return $this->hasMany(Paseempleado::class, 'CI', 'CI');
   }

   // Relación con el modelo Retraso
   public function retrasos()
   {
       return $this->hasMany(Retraso::class, 'CI', 'CI');
   }
}
