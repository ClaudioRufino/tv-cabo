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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->string('ano');
            $table->double('valor');
            $table->string('data_pagamento');

            $table->foreignId('user_id')->constrained('users'); /* Chave Estrangeira */
            $table->foreignId('cliente_id')->constrained('clientes'); /* Chave Estrangeira */
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
