<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            ['nombre' => 'Turno A', 'hora_entrada' => '08:00', 'hora_salida' => '17:00'],
            ['nombre' => 'Turno B', 'hora_entrada' => '09:00', 'hora_salida' => '18:00'],
            ['nombre' => 'Turno C', 'hora_entrada' => '06:00', 'hora_salida' => '15:00'],
        ];

        foreach ($horarios as $horario) {
            Horario::firstOrCreate($horario);
        }
    }
}
