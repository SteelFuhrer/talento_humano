<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ctiporetraso;

class CtiporetrasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDeRetraso = [
            ['tipoderetraso' => 'Emergencia familiar'],
            ['tipoderetraso' => 'Huelga en vía pública'],
            ['tipoderetraso' => 'Congestionamiento vehicular'],
            ['tipoderetraso' => 'Retraso sin justificación'],
        ];

        foreach ($tiposDeRetraso as $retraso) {
            Ctiporetraso::firstOrCreate($retraso);
        }
    }
}
