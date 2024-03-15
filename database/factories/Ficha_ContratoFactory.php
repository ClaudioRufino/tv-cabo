<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ficha_Contrato>
 */
class Ficha_ContratoFactory extends Factory
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
            'dia_pagamento' => $this->faker->randomNumber,
            'data_contrato'=> $this->faker->date,

            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
                }
        ];
    }
}
