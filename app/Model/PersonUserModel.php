<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonUserModel extends Model
{
    
    protected $table = "request_users";
    protected $fillable = [
    	'id'
		,'person_id'
		,'username'
		,'password'
		,'alternate_email'
    ];

}
