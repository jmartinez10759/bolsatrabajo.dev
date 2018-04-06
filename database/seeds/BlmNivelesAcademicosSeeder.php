<?php

use Illuminate\Database\Seeder;

class BlmNivelesAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$niveles = ['Doctorado','Maestria','Licenciatura','Bachillerato','Secundaria'];

    	for ($i=0; $i < sizeof( $niveles ) ; $i++) { 
	        
	        App\Model\NivelAcademicoModel::create([
	        	'nombre' => $niveles[$i]
	        ]);
    		
    	}



    }

}



    