<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Multa>
 */
class MultaFactory extends Factory
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
            'valor' => $this->faker->randomNumber,
            'estado'=> $this->faker->name,
            'descricao'=> $this->faker->word,
            'data_emissao'=> $this->faker->date,
            'data_vencimento'=> $this->faker->date,

            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
                }
        ];
    }
}
