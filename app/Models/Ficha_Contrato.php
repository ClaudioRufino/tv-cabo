<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_pagamento',
        'data_contrato',
        
        'cliente_id'/* Chave Estrangeira */
    ];


    public function cliente(){
        return $this->belongsTo(Cliente::class);
    } 
}
