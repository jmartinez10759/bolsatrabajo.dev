<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
  	protected $table = "job_offers";
  	protected $connection = "blm_mysql";
  	public $timestamps = false;
    public $fillable = [
     'id'
		,'name'
		,'title'
		,'code'
		,'responsible_user_id'
		,'created_by_user_id'
		,'account_id'
		,'account_client_id'
		,'department'
		,'picture'
		,'email'
		,'description_short'
		,'description_large'
		,'other_details'
		,'requirements'
		,'date_from'
		,'date_to'
		,'is_active' #datos obligatorios
		,'is_published' #datos obligatorios
		,'highlight'
		,'working_time_type_id' #datos obligatorios
		,'priority'
		,'quantity'
		,'state_id'
		,'county'
		,'postal_code'
		,'contract_type_id' #llave foranea
		,'salary_min'
		,'salary_max'
		,'payment_period_id' #llave foranea
		,'count'
		,'created'
		,'modified'
    ];
    public function accounts(){
        return $this->hasMany('App\Model\AccountsModel','id','account_id');
    }
    public function workingtimetype(){
        return $this->hasMany('App\Model\WorkingTimeTypesModel','id','working_time_type_id');
    }
    public function contractType(){
        return $this->hasMany('App\Model\ContractTypesModel','id','contract_type_id');
    }
    public function estados(){
        return $this->hasMany('App\Model\BlmEstadosModel','id','state_id');
    }



}
