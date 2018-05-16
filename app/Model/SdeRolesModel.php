<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SdeRolesModel extends Model
{
    protected $table = "sde_roles";
    public $fillable = [
    	'id'
        ,'perfil'
        ,'clave_corta'
        ,'estatus'
    ];
}
