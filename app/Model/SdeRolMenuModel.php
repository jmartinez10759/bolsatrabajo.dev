<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SdeRolMenuModel extends Model
{
    protected $table = "sde_rol_menu";
    protected $primaryKey = 'id_rol';
    public $fillable = [
    	'id_rol'
        ,'id_users'
        ,'id_empresa'
        ,'id_sucursal'
        ,'id_menu'
        ,'estatus'
    ];
    public function roles(){
        return $this->hasMany('App\Model\SdeRolesModel','id');
    }
    public function menu(){
        return $this->hasMany('App\Model\SdeMenusModel','id');
    }



}
