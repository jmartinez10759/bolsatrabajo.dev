<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountsPersonsModel extends Model
{
    protected $table = "accounts_persons";
    public $timestamps = false;
    public $fillable = [
			'id'
			,'person_id'
			,'account_id'
			,'type_id'
			,'blood_type_id'
			,'state_id'
			,'marital_status_id'
			,'image_file_name'
			,'phone_number'
			,'mobile_phone_number'
			,'street'
			,'neighborhood'
			,'municipality'
			,'postal_code'
			,'email'
			,'is_wrong_email'
			,'website_url'
			,'facebook_url'
			,'linkedin_url'
			,'googleplus_url'
			,'skype_url'
			,'twitter_url'
			,'youtube_url'
			,'is_deleted'
			,'created'
			,'modified'
    ];
    
}
