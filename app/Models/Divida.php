<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano',
        'mes',
        'valor',
        'estado',
        'data_vencimento',
        
        'cliente_id'/* Chave Estrangeira */
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
