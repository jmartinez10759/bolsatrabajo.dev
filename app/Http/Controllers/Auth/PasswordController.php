<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class PasswordController extends MasterController
{

     public function __construct(){
        parent::__construct();
    }
    /**
     *Metodo para obtener la vista y cargar los datos 
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function index(){

        return view('auth.passwords.email');
    }
    /**
     *Metodo para realizar la consulta por medio de su id
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function show( Request $request ){

        
    }
    /**
     *Metodo para 
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function store( Request $request){

    	$where = ['email' => $request->correo];
    	$response_token = self::$_model::show_model([],$where, new RequestUserModel);
    	if ( $response_token ) {
    		$new_password = str_random(10);
    		$data['password']  			= sha1( $new_password );
    		$data['remember_token']  	= str_random(50);
    		$update_response = self::$_model::update_model($where,$data, new RequestUserModel);
    		if ($update_response) {
    			$send_response = object_to_array($update_response[0]);
    			$send_response['new_password'] = $new_password;	
	    		#envio de correo para validar si existe el correo antes ingresado.
			    Mail::send('emails.reset_password', $send_response, function($message) use ( $send_response ) {
			        $message->to( $send_response['email'], $send_response['name'] )
			        		->from('jorge.martinez@burolaboralmexico.com','Buro Laboral Mexico')
			        		->subject('Cambio de Contraseña');
			    });
	    		return message(true,$response_token,"¡Su cambio de contraseña se le envio a su correo!");
    		}


    	}

    	return message(false,[],"¡Ocurrio un error, favor de verificar el correo.!");
        

    }
    /**
     *Metodo para la actualizacion de los registros
     *@access public
     *@param $token [Description]
     *@return void
     */
    public static function create( $token ){

    	/*$where = ['remember_token' => $token];
    	$verify_token = self::$_model::show_model([],$where, new RequestUserModel);
    	if ($verify_token) {
    		$data['remember_token'] = str_random(50);
    		$where = ['email' => $verify_token[0]->email];
    		$update_response = self::$_model::update_model($where,$data, new RequestUserModel);

    	}

    	return redirect("/");*/

        
    }
    /**
     *Metodo para la actualizacion de los registros
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function update( Request $request){

        
    }
    /**
     *Metodo para borrar el registro
     *@access public
     *@param $id [Description]
     *@return void
     */
    public static function destroy( $id ){

        
    }
}
