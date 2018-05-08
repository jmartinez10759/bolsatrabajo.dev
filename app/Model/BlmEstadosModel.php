<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmEstadosModel extends Model
{
    protected $table = "estados";
    protected $connection = "blm_mysql";
    public $timestamps = false;
    public $fillable = [
    	'id'
    	,'country_id'
        ,'nombre'
        ,'abreviatura'
        ,'eri_id'
    ];
    
}
