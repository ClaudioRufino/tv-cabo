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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('ano');
            $table->string('mes');
            $table->timestamps();
            $table->date('data');
            $table->string('assunto');
            $table->string('descricao');
            $table->foreignId('cliente_id')->constrained('clientes'); /* Chave Estrangeira */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
