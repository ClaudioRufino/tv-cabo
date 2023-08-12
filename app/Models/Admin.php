<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'contacto',
        'email',
        'senha'
    ];

    public function notificacao(){
        return $this->hasMany(Notificacao::class);
    }
}
