<?php

namespace App\Http\Controllers\Candidatos;

#use App\User;
use App\Model\MasterModel;
use Illuminate\Http\Request;
use App\Model\CandidatoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MasterController;

class CandidatosController extends MasterController
{
    

	public function __construct(){
		#parent::__construct();
		$this->middleware('guest');
	}
	
	/**
	 *Se crea un metodo donde se realiza la parte de inserccion 
	 *@access public
	 *@param Request $request
	 *@return void
	 */
	public static function create( Request $request ){

		if ( !self::validaciones( $request->all()['datos'] ) ) {
			return self::validaciones( $request->all()['datos'] );
		}

		$where = [];
		foreach ($request->all()['datos'] as $key => $value) {
			if ( $key == "email" ) {
				$where[$key] = $value;
			}
		}
		#se realiza la consulta para verificar si existen ese candidato en la base de datos
		$consulta = MasterModel::show_model([], $where , new CandidatoModel );
		if( count( $consulta ) > 0 ){
			return message(false,[],"Registro del candidato existente");
		}
		$data = [];
		foreach ($request->all()['datos'] as $key => $value) {
			
			if ($key != "passwordConfirm") {
				$data[$key] = $value;

				if ( $key == "password") {
					$data[$key] = sha1($value);
				}

			}
		}
		$data['remember_token'] = str_random(50);
		$data['api_token'] = str_random(50);
		#se realiza la inserccion.
		$response = MasterModel::insert_model( [ $data ], new CandidatoModel);
		if ( count( $response ) > 0) {
			return message(true,$response,"Transaccion Exitosa");
		}else{
			return message(false,[],"Ocurrio un error");
		}


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
			if ($key == 'terminos') {
				
				if ( $value == false ) {
					echo message(false,[],'Debe de Aceptar los Terminos y Condiciones');
					die();
				}

			}

		}
		return true;
	}
	/**
	 *Metodo para iniciar session eh ingresar con el candidato loggeado.
	 *@access public
	 *@param Request $request [Description]
	 *@return void
	 */
	public static function store( Request $request ){

		$where = [];
		foreach ($request->all()['datos'] as $key => $value) {
			$where[$key] = $value;
			if ( $key == "password" ) {
				$where[$key] = sha1($value);
			}
		}
		#se realiza la consulta para verificar si existen ese candidato en la base de datos
		$consulta = MasterModel::show_model([], $where , new CandidatoModel );
		if( count( $consulta ) > 0 ){
			return redirect()->route('home');
			//return message(true,$candidato,"Transaccion Exitosa");
		}


		#Session::put($session);

	}





}
