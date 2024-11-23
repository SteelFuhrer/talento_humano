<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ausencia;

class AusenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ausencias = [
            ['tipoausencia' => 'Permiso personal'],
            ['tipoausencia' => 'Vacaciones'],
            ['tipoausencia' => 'Licencia médica'],
            ['tipoausencia' => 'Ausencia injustificada'],
        ];

        foreach ($ausencias as $ausencia) {
            Ausencia::firstOrCreate($ausencia);
        }
    }
}
