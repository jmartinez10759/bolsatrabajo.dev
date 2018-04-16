<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountsModel extends Model
{
    
	protected $table = "accounts";
    public $fillable = [
    	'id'
		,'parent_account_id'
		,'logo'
		,'name'
		,'line_of_business'
		,'account_executive_id'
		,'street'
		,'neighborhood'
		,'municipality'
		,'postal_code'
		,'city'
		,'country_id'
		,'state_id'
		,'is_blocked'
		,'is_enabled'
		,'is_reseller'
		,'is_partner'
		,'reseller_id'
		,'authorization_observation'
		,'is_association'
		,'association_id'
		,'member_since'
		,'image_file_name'
		,'is_authorized'
		,'authorized_by_user_id'
		,'authorization_date'
		,'authorization_token'
		,'account_authorization_state_id'
		,'website_url'
		,'created_by_user_id'
		,'extra_data'
		,'use_logo_in_laboral_report'
		,'last_welcome_msg_sent_date'
		,'last_welcome_msg_sent_user_id'
		,'modified'
		,'created'
    ];



}
