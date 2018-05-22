<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkingTimeTypesModel extends Model
{
  protected $table      = "working_time_types";
  public $timestamps    = false;
  protected $connection = "blm_mysql";
  public $fillable = [
      'id'
      ,'name'
      ,'is_global'
      ,'account_id'
      ,'created'

  ];


}
