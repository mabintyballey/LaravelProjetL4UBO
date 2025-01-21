<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'level' => $this->faker->randomElement(['Licence 1', 'Licence 2', 'Licence 3' , 'Licence 4', 'Master 1', 'Master 2']),
                'concentration' => $this->faker->randomElement(['Reséaux', 'Développement', 'Base de données', 'Droit public', 'Sécurité','Programmation']),
            ];
    }
}
