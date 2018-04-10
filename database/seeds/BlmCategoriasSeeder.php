<?php

use Illuminate\Database\Seeder;

class BlmCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
        	'ADMINISTRATIVOS'                      
			,'DISEÑO'                       
			,'BIOLOGÍA'                       
			,'CIENTÍFICO/INVESTIGACIÓN'
			,'CONSTRUCCIÓN'          
			,'DERECHO/LEYES'
			,'DIRECCIÓN/GERENCIAS'
			,'CONTABILIDAD'               
			,'EDUCACIÓN'                   
			,'LOGÍSTICA'
			,'MANUFACTURA'
			,'MERCADOTECNIA'
			,'RECURSOS HUMANOS'
			,'SECTOR SALUD'
			,'TÉCNICOS/INGENIERÍA'
			,'TECNOLOGÍAS DE LA INFORMACIÓN/SISTEMAS'
			,'TURISMO/GASTRONOMÍA'
			,'VENTAS'                      
			,'VETERINARIA/ZOOLOGÍA'
			,'OTROS'   
        ];

        for ($i=0; $i < sizeof( $categorias ) ; $i++) { 
	        
	        App\Model\CategoriaModel::create([
	        	'nombre' => $categorias[$i]
	        ]);
    		
    	}



    }


}
