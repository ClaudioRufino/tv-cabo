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
        
        'admin_id',  /* Chave Estrangeira */
        'cliente_id' /* Chave Estrangeira */
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
