<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Empleado::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'apellido2' => $this->faker->lastName,
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'direccionparticular' => $this->faker->address,
            'lugarnacimiento' => $this->faker->city,
            'telefonomovil' => $this->faker->numerify('9###########'),
            'correoelectronico' => $this->faker->unique()->safeEmail,
            'estcivil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']),
            'colorpelo' => $this->faker->randomElement(['Negro', 'Castaño', 'Rubio', 'Pelirrojo', 'Canoso']),
            'estatura' => $this->faker->numberBetween(150, 200), // En centímetros
        ];
    }
}
