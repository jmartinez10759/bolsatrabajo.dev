<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonsEmploymentsModel extends Model
{
  protected $table = "persons_employments";
  protected $connection = "blm_mysql";
  public $timestamps = false;
  public $fillable = [
      'id'
      ,'company'
      ,'date_in'
      ,'date_out'
      ,'position'
      ,'salary'
      ,'department'
      ,'chief_name'
      ,'branch_office'
      ,'phone_number'
      ,'person_id'
      ,'state_id'
      ,'quit_reason'
      ,'created'
      ,'modified'
  ];
}
