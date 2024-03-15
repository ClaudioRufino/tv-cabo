<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagamento>
 */
class PagamentoFactory extends Factory
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
            'mes' => $this->faker->name,
            'ano'=> $this->faker->email,
            'valor'=> $this->faker->randomNumber,
            'data_pagamento'=> $this->faker->date,

            'admin_id'=> function(){
                return Admin::factory()->create()->id;
            }
            ,
            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
            }
        ];
    }
}
