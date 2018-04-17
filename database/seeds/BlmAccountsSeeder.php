<?php

use Illuminate\Database\Seeder;

class BlmAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    	App\Model\AccountsModel::insert([
	    	
	    	'id' 	=>  1
			,'parent_account_id' => null 
			,'logo' 	=>  null
			,'name' 	=>  "Buro Laboral Mexico"
			,'line_of_business' 	=>  null
			,'account_executive_id' 	=> null  
			,'street' 	=>  ""
			,'neighborhood' 	=>  null
			,'municipality' 	=>  null
			,'postal_code' 	=>  55790
			,'city' 	=>  null
			,'country_id' 	=> 123 
			,'state_id' 	=>  9
			,'is_blocked' 	=>  0
			,'is_enabled' 	=>  0
			,'is_reseller' 	=>  0
			,'is_partner' 	=>  null
			,'reseller_id' 	=>  null
			,'authorization_observation' 	=>  null
			,'is_association' 	=>  0
			,'association_id' 	=>  null
			,'member_since' 	=>  null
			,'image_file_name' 	=>  null
			,'is_authorized' 	=>  0
			,'authorized_by_user_id' 	=>  null
			,'authorization_date' 	=>  null
			,'authorization_token' 	=>  null
			,'account_authorization_state_id' 	=>  1
			,'website_url' 	=>  "www.burolaboralmexico.com"
			,'created_by_user_id' 	=>  null
			,'extra_data' 	=>  null
			,'use_logo_in_laboral_report' 	=>  0
			,'last_welcome_msg_sent_date' 	=>  null
			,'last_welcome_msg_sent_user_id' 	=> null  
			,'modified' 	=>  null
			,'created' 	=>  null

    	]);




    }
}
