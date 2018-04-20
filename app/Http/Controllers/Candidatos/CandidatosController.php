<?php

namespace App\Http\Controllers\Candidatos;

#use App\User;
use App\Model\MasterModel;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Model\RequestUserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\Auth\AuthController;

class CandidatosController extends MasterController
{
    

	public function __construct(){
		#parent::__construct();
		#$this->middleware('guest');
	}
	/**
	 *Metodo para mostrar la pagina de login.
	 *@access public
	 *@return void
	 */
	public static function index(){

		return View('auth.register');

	}
	/**
	 *Se crea un metodo donde se realiza la parte de inserccion 
	 *@access public
	 *@param Request $request
	 *@return void
	 */
	public static function create( Request $request ){

		#debuger($request->all());
		if ( !self::validaciones( $request->all() ) ) {
			return self::validaciones( $request->all() );
		}
		#$where = [];
		/*foreach ($request->all() as $key => $value) {
			if ( $key == "curp" ) {
				$where[$key] = $value;
			}
		}*/
		$where['email'] = $request->correo;
		#se realiza la consulta para verificar si existen ese candidato en la base de datos
		$consulta = MasterModel::show_model([], $where , new RequestUserModel );
		#debuger($consulta);
		if( count( $consulta ) > 0 ){
			return message(false,[],"Registro del candidato existente");
		}
		$data = [];
		foreach ($request->all() as $key => $value) {
			
			if ($key != "passwordConfirm" && $key != "pass" && $key != "correo") {
				$data[$key] = $value;
			}
		}
		$data['remember_token'] = str_random(50);
		$data['api_token'] 		= str_random(50);
		$data['email'] 			= $request->correo;
		$data['password'] 		= sha1( $request->pass );
		$data['status'] 		= 1;
		$data['confirmed'] 		= false;
		$data['confirmed_code'] = str_random(50);
		$data['confirmed_nss']  = $request->confirmed_nss;
		#debuger($data);
		#se realiza la inserccion.
		$response = MasterModel::create_model( [ $data ], new RequestUserModel);
		if ( count( $response ) > 0) {
			#envio de correo para validar si existe el correo antes ingresado.
		    Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
		        $message->to($data['email'], $data['name'])
		        		->from('jorge.martinez@burolaboralmexico.com','Buro Laboral Mexico')
		        		->subject('Por favor confirma tu correo');
		    });

			return message(true,$response[0],"Favor de verificar su correo, para continuar");
			#AuthController::getData( $response[0] );
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

			if ($key == 'pass' || $key == "passwordConfirm") {
				
				if ( $request['pass'] != $request['passwordConfirm']) {
					 echo message(false,[],'Password');
					 die();
				}
				
				if ( strlen($request[$key]) < 6 ) {
					echo message(false,[],'La longitud del password debe de ser mayor a 6');
					die();
				}

			}
			/*if ($key == 'terminos') {
				
				if ( $value == false ) {
					echo message(false,[],'Debe de Aceptar los Terminos y Condiciones');
					die();
				}

			}*/

		}
		return true;
	
	}




}
