<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'estado',
        'descricao',
        'data_emissao',
        'data_vencimento',
       
        'cliente_id'  /* Chave Estrangeira */
    ];


    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
