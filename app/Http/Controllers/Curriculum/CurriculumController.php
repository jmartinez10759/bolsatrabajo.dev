<?php

namespace App\Http\Controllers\Curriculum;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class CurriculumController extends MasterController
{
    

    public function __construct(){
    	parent::__construct();

    }
    /**
     *Metodo para obtener la vista de los detalles del candidato que se registro al portal.
     *@access public 
     *@return void
     */
    public static function index(){
  		
    	return view('candidato.curriculum');

    }
    /**
     *Metodo para obtener datos del candidato registrado al portal.
     *@access public 
     *@return void
     */
    public static function show(){

        #se realiza la consulta para obtener los datos del Candidato que subira el CV.
        $data = [
            'name' => Session::get('name')
            ,'email' => Session::get('email')
        ];
        return message(true,$data,"Transaccion exitosa");

    }


}
