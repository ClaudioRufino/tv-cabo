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
        Schema::create('ficha__contratos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('dia_pagamento');
            $table->date('data_contrato');
            $table->foreignId('cliente_id')->constrained('clientes'); /* Chave Estrangeira */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha__contratos');
    }
};
