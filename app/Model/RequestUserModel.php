<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestUserModel extends Model
{
    protected $table = "sde_request_users";
    public $fillable = [
    	'id'
		,'id_rol'
		,'name'
		,'first_surname'
		,'second_surname'
		,'email'
		,'password'
		,'remember_token'
		,'api_token'
		,'status'
		,'confirmed'
		,'confirmed_code'
		,'confirmed_nss'
    ];

    public function description(){
        return $this->hasMany('App\Model\DetailCandidateModel','id_users','id');
    }
    public function curriculum(){
        return $this->hasMany('App\Model\BlmCurriculumModel','id_users','id');
    }
    public function postulate(){
        return $this->hasMany('App\Model\BlmPostulateCandidateModel','id_users','id');
    }
    public function numero_seguro_social(){
        return $this->hasMany('App\Model\BlmNssModel','id_users','id');
    }
    public function roles(){
        return $this->hasMany('App\Model\SdeRolesModel','id','id_rol');
    }
    public function permisos(){
        return $this->hasMany('App\Model\SdePermisosModel','id_users','id');
    }


}
