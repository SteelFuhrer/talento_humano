<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ctipoes;

class CtipoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposEs = [
            ['tipoes' => 'Entrada'],
            ['tipoes' => 'Salida'],
        ];

        foreach ($tiposEs as $tipo) {
            Ctipoes::firstOrCreate($tipo);
        }
    }
}
