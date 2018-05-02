<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmCookieSerchModel extends Model
{
    protected $table = "blm_cookie_serch";
    public $fillable = [
    	'id'
    	,'id_users'
        ,'vacante'
    ];
}
