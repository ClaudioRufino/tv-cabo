<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'linha_id',
        'num_casa'
    ];

    public function linha(){
        return $this->hasOne(Linha::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
