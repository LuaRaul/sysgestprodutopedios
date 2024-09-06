<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    protected $fillable = ["nome","descricao","preco","stock"]; 
    use HasFactory,SoftDeletes;
}
