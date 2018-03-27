<?php

namespace App\Http\Controllers\Candidatos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatosController extends Controller
{
    

	public function __construct(){

	}
	
	/**
	 *Se crea un metodo donde se realiza la parte de inserccion 
	 *@access public
	 *@param Request $request
	 *@return void
	 */
	public static function create( Request $request ){
	
		debuger($request->all()['datos']);

		debuger($request);
		echo "jajaja";


	}


}
