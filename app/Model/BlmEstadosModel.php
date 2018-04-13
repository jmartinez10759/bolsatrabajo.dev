<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmEstadosModel extends Model
{
    protected $table = "estados";
    public $fillable = [
    	'id'
    	,'country_id'
        ,'nombre'
        ,'abreviatura'
        ,'eri_id'
    ];
    
}
