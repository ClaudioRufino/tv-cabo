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
        
        'admin_id' /* Chave Estrangeira */
    ];

    
}
