<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public $fillable = ['armario','pratileira','vencimento','situacao','descarte','produtos_id','created_at','updated_at'];

    public function produtos()
    {
        return $this->belongsTo('App\Produto','produtos_id');
    }
}
