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
        ,'id_permiso'
        ,'estatus'
    ];
    public function roles(){
        return $this->hasMany('App\Model\SdeRolesModel','id','id_rol');
    }
    public function menu(){
        return $this->hasMany('App\Model\SdeMenusModel','id','id_menu');
    }
    public function usuarios(){
        return $this->hasMany('App\Model\RequestUserModel','id','id_users');
    }
    public function permisos(){
        return $this->hasMany('App\Model\SdePermisosModel','id_users','id_users');
    }


}
