<?php

use Illuminate\Database\Seeder;

class SdeMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = ['Dashboard','Candidatos','Configuracion','Roles','Menus','Permisos','Portal Candidatos'];
        $link = ['dashboard','candidate','','roles','menus','permisos','details'];
        $tipo = ['SIMPLE','SIMPLE','PADRE','HIJO','HIJO','HIJO','SIMPLE'];
        $orden = [1,2,3,1,2,3,4];
        $icon = ['fa fa-home','fa fa-male','fa fa-cog','fa fa-plus-circle','','fa fa-file-text','fa fa-male'];
        $padre = [0,0,0,3,3,3,0];
        $status = [1,1,0,0,0,0,1];
        
    	for ($i=0; $i < sizeof( $menus ) ; $i++) { 
	        
	        App\Model\SdeMenusModel::create([
		        'id_padre' 	=> $padre[$i]
		        ,'texto' 	=> $menus[$i]
		        ,'link' 	=> $link[$i]
		        ,'tipo' 	=> $tipo[$i]
		        ,'orden' 	=> $orden[$i]
		        ,'estatus' 	=> $status[$i]
		        ,'icon' 	=> $icon[$i]
	        ]);
    		
    	}

    }
}
