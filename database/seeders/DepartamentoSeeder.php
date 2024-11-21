<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            [
                'nombredpto' => 'Recursos Humanos',
                'correoelectronicodpto' => 'rrhh@empresa.com',
                'telefonodpto' => '123-456-7890',
            ],
            [
                'nombredpto' => 'Finanzas',
                'correoelectronicodpto' => 'finanzas@empresa.com',
                'telefonodpto' => '987-654-3210',
            ],
            [
                'nombredpto' => 'Tecnología',
                'correoelectronicodpto' => 'tecnologia@empresa.com',
                'telefonodpto' => '555-123-4567',
            ],
            [
                'nombredpto' => 'Marketing',
                'correoelectronicodpto' => 'marketing@empresa.com',
                'telefonodpto' => '555-987-6543',
            ],
        ];

        foreach ($departamentos as $departamento) {
            Departamento::firstOrCreate($departamento);
        }
    }
}
