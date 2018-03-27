<?php

namespace App\Http\Controllers\Candidatos;

use Illuminate\Http\Request;
use App\Model\CandidatoModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MasterController;

class CandidatosController extends MasterController
{
    

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 *Se crea un metodo donde se realiza la parte de inserccion 
	 *@access public
	 *@param Request $request
	 *@return void
	 */
	public static function create( Request $request ){
		

		#debuger( self::validaciones( $request->all()['datos'] ) );
		if ( !self::validaciones( $request->all()['datos'] ) ) {
			return self::validaciones( $request->all()['datos'] );
		}
		echo "llego aqui";
		debuger($request->all());
		#$candidatos = 	





	}
	/**
	 *Metodo para la validacion de los campos si vienen correctamente
	 *@access public
	 *@param $request array [Description]
	 *@return void
	 **/
	public static function validaciones( $request ){

		foreach ($request as $key => $value) {

			if ($key == 'password' || $key == "passwordConfirm") {
				
				if ( $request['password'] != $request['passwordConfirm']) {
					 echo message(false,[],'Password');
					 die();
				}
				
				if ( strlen($request[$key]) < 6 ) {
					echo message(false,[],'La longitud del password debe de ser mayor a 6');
					die();
				}
			}
		}

	}



}
