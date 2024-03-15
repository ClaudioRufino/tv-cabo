<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano',
        'mes',
        'data',
        'assunto',
        'descricao',
        
        'cliente_id' /* Chave Estrangeira */
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
