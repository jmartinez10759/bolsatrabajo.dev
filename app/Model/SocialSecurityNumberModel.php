<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocialSecurityNumberModel extends Model
{
    
	protected $table = "social_security_numbers";
    protected $fillable = [
    	'id'
		,'person_id'
		,'nss'
		#,'is_wrong_nss'
		#,'created_by_user_id'
		#,'account_id'
		#,'is_deleted'
		#,'is_locked'
    ];












}
