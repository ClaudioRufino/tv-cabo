<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_casa',
        'linha_id',
        'descricao',
        'cliente_id'/* Chave Estrangeira */
    ];

    public function linha(): HasOne
    {
        return $this->hasOne(Linha::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
