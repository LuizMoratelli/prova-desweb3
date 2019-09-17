<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
    ];

    public function vendas() {
        return $this->hasMany('App\VendaProduto');
    }
}
