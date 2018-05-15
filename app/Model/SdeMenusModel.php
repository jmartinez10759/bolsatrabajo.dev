<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SdeMenusModel extends Model
{
    protected $table = "sde_menus";
    public $fillable = [
    	'id'
        ,'id_padre'
        ,'texto'
        ,'link'
        ,'tipo'
        ,'orden'
        ,'estatus'
        ,'icon'
    ];
}
