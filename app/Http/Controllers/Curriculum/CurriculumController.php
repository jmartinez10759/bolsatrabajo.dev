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

    	debuger('llego para obtener los datos del candidato');

    }


}
