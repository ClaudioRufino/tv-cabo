<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'mes',
        'ano',
        'valor',
        'data_pagamento',
        'atendido_por',  /* Incluir simplesmente o nome do Administrador que atendeu o cliente */

        'cliente_id' /* Chave Estrangeira */
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function user(){
        return $this->belongsTo(Admin::class);
    }
}
