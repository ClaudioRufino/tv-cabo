<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Divida>
 */
class DividaFactory extends Factory
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
            'ano' => $this->faker->year,
            'mes'=> $this->faker->randomNumber,
            'valor'=> $this->faker->randomNumber,
            'estado'=> $this->faker->randomNumber,
            'data_vencimento'  =>  $this->faker->date,

            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
            }
        ];
    }
}
