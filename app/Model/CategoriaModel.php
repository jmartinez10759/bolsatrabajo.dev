<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = "sde_categorias";
    public $fillable = [
    	'id'
		,'nombre'
    ];
}
