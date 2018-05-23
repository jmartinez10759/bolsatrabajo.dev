<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContractTypesModel extends Model
{
  protected $table = "contract_types";
  public $timestamps = false;
  protected $connection = "blm_mysql";
  public $fillable = [
      'id'
      ,'name'
      ,'account_id'
      ,'is_global'
      ,'created'
  ];

}
