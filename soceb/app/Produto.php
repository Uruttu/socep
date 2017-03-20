<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $fillable = ['nome','principioAtivo','apresentacao','conservacao','created_at','updated_at'];

    public function itens()
    {
        return $this->hasMany('App\Item');
    }
}
