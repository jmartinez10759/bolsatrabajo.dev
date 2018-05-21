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
		,'is_active'
		,'published'
		,'priority'
		,'quantity'
		,'state_id'
		,'county'
		,'postal_code'
		,'contract_type_id'
		,'salary_min'
		,'salary_max'
		,'payment_period_id'
		,'count'
		,'created'
		,'modified'
    ];
}
