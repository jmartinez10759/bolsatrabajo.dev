<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestUserModel extends Model
{
    protected $table = "request_users";
    public $fillable = [
    	'id'
		,'name'
		,'first_surname'
		,'second_surname'
		,'email'
		,'password'
		,'remember_token'
		,'api_token'
    ];


}
