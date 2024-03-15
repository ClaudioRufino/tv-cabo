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
            $table->integer('estado'); // 1 - Com dívida; 0 - Sem dívida
            $table->date('data_vencimento')->nullable();
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
