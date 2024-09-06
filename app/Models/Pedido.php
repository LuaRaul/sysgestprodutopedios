<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ["produto_id","quantidade","total_preco"]; 
    function produto(){
        return $this->belongsTo(Produto::class);
    }
}
