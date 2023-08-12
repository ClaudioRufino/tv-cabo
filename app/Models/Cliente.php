<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'contacto',
        'genero',
        'BI',
        'foto',
        /* Chave Estrangeira */
        'endereco_id'
    ];

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }

    public function ficha_contrato(){
        return $this->hasOne(Ficha_Contrato::class);
    }

    public function multa(){
        return $this->hasMany(Multa::class);
    }

    public function divida(){
        return $this->hasMany(Divida::class);
    }

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

    public function pagamento(){
        return $this->hasMany(Pagamento::class);
    }
}
