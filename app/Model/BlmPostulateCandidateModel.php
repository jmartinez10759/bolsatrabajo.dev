<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmPostulateCandidateModel extends Model
{
    protected $table = "sde_postulate_candidate";
    public $fillable = [
    	'id'
    	,'id_users'
        ,'id_vacante'
    ];
    public function usuarios(){
      return $this->hasMany('App\Model\DetailCandidateModel','id_users','id_users');
    }
    public function vacantes(){
      return $this->hasMany('App\Listado','id','id_vacante');
    }


}
