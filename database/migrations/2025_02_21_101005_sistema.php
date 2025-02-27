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
        Schema::create('sistemas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('multa')->nullable();
            $table->string('mensalidade')->nullable();
            $table->string('ativos')->nullable(); 
            $table->string('dia_significativo')->nullable(); 
            $table->date('inativos')->nullable();
            $table->string('data_atual')->nullable();
            $table->date('descricao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistemas');
    }
};
