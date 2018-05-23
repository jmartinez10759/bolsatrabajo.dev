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
		$status = [1,1,0,0,0,0,1];
        #$permiso = [1,2,3,4];
        for ($i=0; $i < count( $menus ); $i++) { 
	        
		    App\Model\SdeRolMenuModel::create([
	        	'id_rol'		=> 1
		        ,'id_users'		=> 1
		        ,'id_empresa'   => 0
		        ,'id_sucursal'  => 0
		        ,'id_menu' 		=> $menus[$i]
		        ,'id_permiso' 	=> 1 
		        ,'estatus' 		=> $status[$i]
		    ]);
	        	
        	
        }

       /* for ($i=0; $i < count( $menus ); $i++) { 
	        
	        for ($j=0; $j < count($permiso); $j++) { 
		        
		        App\Model\SdeRolMenuModel::create([
		        	'id_rol'		=> 1
			        ,'id_users'		=> 1
			        ,'id_empresa'   => 0
			        ,'id_sucursal'  => 0
			        ,'id_menu' 		=> $menus[$i]
			        ,'id_permiso' 	=> $permiso[$j] 
			        ,'estatus' 		=> 1
		        ]);
	        	
	        }
        	
        }*/

    }
}
