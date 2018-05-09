<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestUserModel extends Model
{
    protected $table = "blm_request_users";
    public $fillable = [
    	'id'
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
        return $this->hasMany('App\Model\DetailCandidateModel','id_users');
    }
    public function curriculum(){
        return $this->hasMany('App\Model\BlmCurriculumModel','id_users');
    }
    public function postulate(){
        return $this->hasMany('App\Model\BlmPostulateCandidateModel','id_users');
    }



}
