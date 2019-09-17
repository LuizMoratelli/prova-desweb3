<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $table = 'vendas_produtos';
    protected $fillable = [
        'quantidade',
    ];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

    public function venda()
    {
        return $this->belongsTo('App\Venda');
    }
}
