<?php

use Illuminate\Database\Seeder;

class BlmEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	
    	$estados = [
    		'Aguascalientes'
			,'Baja California'
			,'Baja California Sur'
			,'Campeche'
			,'Coahuila de Zaragoza'
			,'Colima'
			,'Chiapas'
			,'Chihuahua'
			,'Ciudad de México'
			,'Durango'
			,'Guanajuato'
			,'Guerrero'
			,'Hidalgo'
			,'Jalisco'
			,'México'
			,'Michoacán de Ocampo'
			,'Morelos'
			,'Nayarit'
			,'Nuevo León'
			,'Oaxaca'
			,'Puebla'
			,'Querétaro'
			,'Quintana Roo'
			,'San Luis Potosí'
			,'Sinaloa'
			,'Sonora'
			,'Tabasco'
			,'Tamaulipas'
			,'Tlaxcala'
			,'Veracruz de Ignacio de la Llave'
			,'Yucatán'
			,'Zacatecas'
    	];


        for ($i=0; $i < count($estados); $i++) { 
        	
	        App\Model\BlmEstadosModel::create([
	        	'state' => $estados[$i]
	        ]);
        }

    }
}

