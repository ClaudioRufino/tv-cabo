<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'estado',
        'assunto',
        'descricao',
        
        'cliente_id' /* Chave Estrangeira */
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    
}
