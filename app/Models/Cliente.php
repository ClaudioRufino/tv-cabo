<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'contacto',
        'genero',
        // 'BI',
        'foto', 
        'estado'
        
        //'endereco_id' /* Chave Estrangeira */
    ];

    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class);
    }

    public function ficha_contrato(): HasOne
    {
        return $this->hasOne(Ficha_Contrato::class);
    }

    public function multa(): HasMany
    {
        return $this->hasMany(Multa::class);
    }

    public function divida(): HasMany
    {
        return $this->hasMany(Divida::class);
    }

    public function pedido(): HasMany
    {
        return $this->hasMany(Pedido::class);
    }

    public function pagamento(): HasMany
    {
        return $this->hasMany(Pagamento::class);
    }

    public function notificacao(): HasMany
    {
        return $this->hasMany(Notificacao::class);
    }
}
