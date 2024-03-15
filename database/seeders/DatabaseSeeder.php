<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Agencia;
use App\Models\Cliente;
use App\Models\Divida;
use App\Models\Endereco;
use App\Models\Ficha_Contrato;
use App\Models\Linha;
use App\Models\Multa;
use App\Models\Notificacao;
use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(1)->create();
        // Agencia::factory(5)->create();
        Cliente::factory(2)->create();
        // Divida::factory(5)->create();
        // Endereco::factory(5)->create();
        // Ficha_Contrato::factory(5)->create();
        // Linha::factory(5)->create();
        // Multa::factory(5)->create();
        // Notificacao::factory(5)->create();
        // Pagamento::factory(5)->create();
        // Pedido::factory(5)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
