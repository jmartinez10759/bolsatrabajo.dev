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
        $menus = ['Dashboard','Candidatos','Configuracion','Roles','Menus','Permisos','Cerrar Sesion'];
        $link = ['dashboard','candidate','','roles','menus','permisos','logout'];
        $tipo = ['SIMPLE','SIMPLE','PADRE','HIJO','HIJO','HIJO','SIMPLE'];
        $orden = [1,2,3,1,2,3,4];
        $icon = ['fa fa-home','fa fa-user-circle-o','fa fa-cog','fa fa-plus-circle','','fa fa-file-text','fa fa-power-off'];
        $padre = [0,0,0,3,3,3,0];
    	for ($i=0; $i < sizeof( $menus ) ; $i++) { 
	        
	        App\Model\SdeMenusModel::create([
		        'id_padre' 	=> $padre[$i]
		        ,'texto' 	=> $menus[$i]
		        ,'link' 	=> $link[$i]
		        ,'tipo' 	=> $tipo[$i]
		        ,'orden' 	=> $orden[$i]
		        ,'estatus' 	=> 1
		        ,'icon' 	=> $icon[$i]
	        ]);
    		
    	}

    }
}
