<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nome' => $this->faker->name,
            'contacto'=> $this->faker->phoneNumber,
            'email'=> $this->faker->email,
            'senha'=> $this->faker->password
        ];
    }
}
