<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'comprador',
        'descricao',
        'status',
    ];

    public function produtos() {
        return $this->hasMany('App\VendaProduto');
    }
}
