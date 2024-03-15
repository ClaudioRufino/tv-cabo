<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notificacao>
 */
class NotificacaoFactory extends Factory
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
            'data' => $this->faker->date,
            'estado'=> $this->faker->name,
            'assunto'=> $this->faker->word,
            'descricao'=> $this->faker->name,

            'cliente_id'=> function(){
                return Cliente::factory()->create()->id;
            }
        ];

    }
}
