<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'edad' => $this->faker->numberBetween(18, 50),
            'password' => bcrypt($this->faker->password), 
            'email' => $this->faker->unique()->safeEmail,
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
        ];
    }
}
