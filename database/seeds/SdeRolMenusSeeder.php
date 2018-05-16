<?php

use Illuminate\Database\Seeder;

class SdeRolMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [1,2,3,4,5,6,7];

        for ($i=0; $i < count( $menus ); $i++) { 
	        
	        App\Model\SdeRolMenuModel::create([
	        	'id_rol'		=> 1
		        ,'id_users'		=> 1
		        ,'id_empresa'   => 0
		        ,'id_sucursal'  => 0
		        ,'id_menu' 		=> $menus[$i]
		        ,'estatus' 		=> 1
	        ]);
        	
        }


    }
}
