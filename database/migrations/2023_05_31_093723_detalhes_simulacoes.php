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
        Schema::create('detalhes_simulacoes', function (Blueprint $table) {
            $table->id();
            $table->double('montante_pedido');
            $table->double('prestacao_mensal');
            $table->double('taxa_de_juros');
            $table->integer('meses_de_pagamento');
            $table->double('montante_total_a_pagar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalhes_simulacoes');
    }
};
