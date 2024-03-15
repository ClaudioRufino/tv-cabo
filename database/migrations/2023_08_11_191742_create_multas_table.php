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
        Schema::create('multas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('valor');
            $table->string('estado');
            $table->string('descricao'); 
            $table->date('data_emissao');
            $table->date('data_vencimento')->nullable();
            $table->foreignId('cliente_id')->constrained('clientes'); /* Chave Estrangeira */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
