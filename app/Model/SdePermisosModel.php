<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SdePermisosModel extends Model
{
    protected $table = "sde_permisos";
    public $fillable = [
    	'id'
        ,'id_users'
        ,'clave_corta'
        ,'descripcion'
    ];
}
