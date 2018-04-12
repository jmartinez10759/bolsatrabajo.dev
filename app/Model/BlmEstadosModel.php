<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmEstadosModel extends Model
{
    protected $table = "blm_estados";
    public $fillable = [
    	'id_state'
        ,'state'
    ];
    
}
