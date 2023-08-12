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
        Schema::create('dividas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ano');
            $table->string('mes');
            $table->double('valor');
            $table->string('estado');
            $table->date('data_vencimento');
            $table->foreignId('cliente_id')->constrained('clientes');/* Chave Estrangeira */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividas');
    }
};
