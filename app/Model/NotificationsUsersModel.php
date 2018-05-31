<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationsUsersModel extends Model
{
  protected $table = "users_growl_notifications";
  protected $connection = "blm_mysql";
  public $timestamps = false;
  public $fillable = [
    'id'
    ,'growl_notification_id'
    ,'user_id'
    ,'viewed'
    ,'date_viewed'
    ,'from_date'
    ,'to_date'
    ,'created'
    ,'modified'
  ];


}
