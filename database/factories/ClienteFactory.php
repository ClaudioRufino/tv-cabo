<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
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
            'contacto'=> $this->faker->e164PhoneNumber,
            // 'BI'  =>  $this->faker->word,
            'genero' => $this->faker->randomLetter,
            'foto' => $this->faker->url,
            'estado' => true
        ];
    }
}
