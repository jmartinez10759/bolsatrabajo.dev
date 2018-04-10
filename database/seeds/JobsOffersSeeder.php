<?php

use Illuminate\Database\Seeder;

class JobsOffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Model\JobsOffersModel::create([

				'name' => "DESARROLLADOR PHP"
				,'title' => "BURO LABORAL MEXICO"
				,'code' => ""
				,'responsible_user_id' => 0
				,'created_by_user_id' => 0
				,'account_id' => 0
				,'account_client_id' => 0
				,'departament' => "SISTEMAS"
				,'picture' => ""
				,'email' => ""
				,'description_short' => ""
				,'description_large' => ""
				,'other_details' => ""
				,'requirements' => ""
				,'date_from' => ""
				,'date_to' => ""
				,'is_active' => ""
				,'published' => ""
				,'priority' => ""
				,'quantity' => ""
				,'state_id' => 1
				,'county' => ""
				,'postal_code' => ""
				,'contract_type_id' => 0
				,'salary_min' => ""
				,'salary_max' => ""
				,'payment_period_id' => 0
				,'count' => ""
        ]);
    }
}
