<?php

use Illuminate\Database\Seeder;

class BlmJobsOffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$vacante = [
    		'ADMINISTRACION'
    		,'CONTABILIDAD'
    		,'DESARROLLADOR PHP'
    		,'ANALISTA'
    		,'DESARROLLOR FRONTEND'
    		,'ARQUITECTO'
    		,'PROGRAMADOR WEB'
    		,'NOMINAS'
    		,'RECURSOS HUMANOS'
    		,'DESARROLLOR FULLSTACK'
    	];
    	$empresa = [
    		'BIMBO'
    		,'COCA COLA'
    		,'INTELEGIS'
    		,'BGT SISTEMAS'
    		,'CPA VISON'
    		,'BURO LABORAL MEXICO'
    		,'PAE EMPRESARIAL'
    		,'TELCEL'
    		,'STO CONSULTING'
    		,'AMSA'
    	];

    	$count = 1;
    	for ($i=0; $i < sizeof($vacante); $i++) { 
    		
	        App\Model\BlmJobsOffersModel::insert([

	        	'id' 					=> $count
	        	,'name' 				=> $vacante[$i]
				,'title' 				=> $empresa[$i]
				,'code' 				=> 12
				,'responsible_user_id' 	=> null
				,'created_by_user_id' 	=> null
				,'account_id' 			=> 1
				,'account_client_id' 	=> null
				,'department' 			=> "SISTEMAS"
				,'picture' 				=> ""
				,'email' 				=> ""
				,'description_short' 	=> ""
				,'description_large' 	=> ""
				,'other_details' 		=> ""
				,'requirements' 		=> ""
				,'date_from' 			=> "2014-04-12"
				,'date_to' 				=> "2014-04-12"
				,'is_active' 			=> 1
				,'published' 			=> 1
				,'priority' 			=> 1
				,'quantity' 			=> 1
				,'state_id' 			=> 1
				,'county' 				=> ""
				,'postal_code' 			=> ""
				,'contract_type_id' 	=> 0
				,'salary_min' 			=> 15000
				,'salary_max' 			=> 30000
				,'payment_period_id' 	=> null
				,'count' 				=> 15

	        ]);

    		$count++;
    	}

    }

}
