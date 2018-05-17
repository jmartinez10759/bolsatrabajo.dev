<?php

use Illuminate\Database\Seeder;

class SdePermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$clave = ['UPD','INS','DEL','CON'];
    	$descripcion = ['update','insert','destroy','select'];

    	for ($i=0; $i < sizeof( $clave ); $i++) { 
	        
	        App\Model\SdePermisosModel::create([
	        	'id_users' 		=> 1
	        	,'clave_corta' 	=> $clave[$i]
        		,'descripcion'	=> $descripcion[$i]
	        ]);

    	}

    }

}
