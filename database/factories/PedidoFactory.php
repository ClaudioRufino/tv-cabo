<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
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
            'data'=> $this->faker->date,
            'assunto' => $this->faker->name,
            'descricao'=> $this->faker->word,

            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
            }
        ];
    }
}
