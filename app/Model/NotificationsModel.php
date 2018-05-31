<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
  protected $table = "growl_notifications";
  protected $connection = "blm_mysql";
  public $timestamps = false;
  public $fillable = [
        'id'
        ,'title'
        ,'text'
        ,'created_by_user_id'
        ,'delay'
        ,'allow_dismiss'
        ,'icon'
        ,'position'
        ,'link'
        ,'type_class'
        ,'animation'
        ,'created'
        ,'modified'

  ];

}
