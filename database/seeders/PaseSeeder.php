<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cmotivopase;

class PaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motivos = [
            ['motivopase' => 'Emergencia familiar'],
            ['motivopase' => 'Cita médica'],
            ['motivopase' => 'Trámite administrativo'],
            ['motivopase' => 'Otro motivo'],
        ];

        foreach ($motivos as $motivo) {
            Cmotivopase::firstOrCreate($motivo);
        }
    }
}
