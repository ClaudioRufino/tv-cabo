<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string('rua');
            $table->string('num_casa')->nullable();
            $table->string('descricao')->nullable();
            $table->foreignId('linha_id')->constrained('linhas');
            $table->foreignId('cliente_id')->constrained('clientes'); // Chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
