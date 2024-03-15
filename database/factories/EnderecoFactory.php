<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Linha;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'rua' => $this->faker->name,
                'num_casa' => $this->faker->randomNumber,
                
                'linha_id'=> function(){
                    return Linha::factory()->create()->id;
                },

                'cliente_id'=> function(){
                    return Cliente::factory()->create()->id;
                }
        ];
    }
}
