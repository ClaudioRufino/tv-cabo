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
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('data');
            $table->string('estado');
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
        Schema::dropIfExists('notificacaos');
    }
};
