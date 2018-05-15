<?php

use Illuminate\Database\Seeder;

class SdeRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Administrador','Candidato'];
        $clave_corta = ['admin','Cand'];
    	for ($i=0; $i < sizeof( $roles ) ; $i++) { 
	        
	        App\Model\SdeRolesModel::create([
	        	'perfil' 		=> $roles[$i]
		        ,'clave_corta'  => $clave_corta[$i]
		        ,'estatus'		=> 1
	        ]);
    		
    	}

    }
}
