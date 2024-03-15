<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agencia>
 */
class AgenciaFactory extends Factory
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
            'gerente_nome'=> $this->faker->name,
            'bairro'=> $this->faker->name,
            'rua'=> $this->faker->name,
            'senha'=> $this->faker->password,
        ];
    }
}
