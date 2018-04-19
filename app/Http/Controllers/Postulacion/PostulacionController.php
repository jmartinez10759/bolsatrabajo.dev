<?php

namespace App\Http\Controllers\Postulacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class PostulacionController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para la inserccion de los datos en las tablas de Buro Laboral Mexico
     *@access public
     *@param Request $request [description]
     *@return void
     */
    public static function store( Request $request ){
    	debuger( $request->all() );
    }


}
