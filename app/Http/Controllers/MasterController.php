<?php

namespace App\Http\Controllers;

use App\Model\MasterModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{

	public static $_client;
    public $_tipo_user;
    public static $_domain = "";
    protected $_tipo = "application/json";
    public $_http;
    public static $_model;
    protected static $message_success;
    protected static $message_error;

    public function __construct(){

        self::$_client = new Client();
        self::$_domain = $_SERVER['HTTP_HOST'];
        self::$_model = new MasterModel();
        self::$message_success = "¡Transaccion Exitosa.!";
        self::$message_error = "¡Ocurrio un error, favor de verificar.!";

    }
    /**
     *Verifica si tiene acceso a esta parte del menu por cada accion
     *@access protected 
     *@param
     *@param
     *@return void
     */
    public function verify_permison(){

        $server        = $_SERVER['REQUEST_METHOD'];
        $http_usuario  = isset( $_SERVER['HTTP_USUARIO'] )? $_SERVER['HTTP_USUARIO']:"";
        $http_token    = isset( $_SERVER['HTTP_TOKEN'] )? $_SERVER['HTTP_TOKEN']:"";

        $url_permisos   = "http://52.44.90.182/api/privileges";
        $url_token      = "http://52.44.90.182/api/userData";
        $headers        = ['Content-Type' => 'application/json'];
        $data           = ['token' => $http_token ,'usuario' => $http_usuario ];
        $method         = 'post';
        if ($http_token && $http_usuario) {
            $token = self::endpoint($url_token,$headers, $data , $method );
            if ( isset($token->error) && $token->error == true ) {
                return $this->show_error(1);
            }
        }
        $data['producto'] = 7;
        $permisson = self::endpoint( $url_permisos,$headers,$data, $method );
        if ( isset( $permisson->rows[0] ) ) {
        	$permisson =  $permisson->rows[0]->perfil_id;
        	$this->_tipo_user = $permisson;
        }else{ $permisson = 0; }
        if ( !in_array( $permisson, [21,19,44,45] )) {
            return $this->show_error(0,$permisson);
        }

        #return $this->show_error(0);

    }
    /**
     *Metodo general para consumir endpoint utilizando una clase de laravel
     *@access protected
     *@param  url [description]
     *@param  header [description]
     *@param  data [description]
     *@return json [description]
     */
    protected static function endpoint( $url = false, $headers = array(), $data = array(),$method=false ){

            $response = self::$_client->$method( $url, ['headers'=> $headers, 'body' => json_encode( $data ) ]);
            $zonerStatusCode = $response->getStatusCode();
            return json_decode($response->getBody());

    }
    /**
	 *Se crea un metodo para mostrar los errores dependinedo la accion a realizar
	 *@access protected
	 *@param int $id []
	 *@return string $errores
	 */
	protected function show_error($id = false, $datos = array()) {

		$errors = [
			#0
			[
				'success' => false,
				'message' => "Acceso Denegado",
				'error'	  => [
					'description' => "No tiene permisos para realizar esta accion",
					'result' 	  => $datos
				 ]

			],
			#1
			[
				'success' => false,
				'message' => "Error en la transaccion",
				'error'	  => [
					'description' => "Token expiro y/o cambio, favor de verificar",
					'result' 	  => $datos
				 ]

			],
			#2
			[
				'success' => false,
				'message' => "Peticion Incorrecta",
				'error'	  => [
					'description' => "El Servicio de Internet es Incorrecto",
					'result' 	  => $datos
				 ]

			],
			#3
			[
				'success' => false,
				'message' => "Identificador diferente y/o vacio",
				'error'	  => [
					'description' => "Ingrese correctamente los campos a consultar",
					'result' 	  => $datos
				 ]

			],
			#4
			[
				'success' => false,
				'message' => "Sin Registros",
				'error'	  => [
					'description' => "No se encontro ningun registro",
					'result' 	  => $datos
				 ]
			],
			#5
			[
				'success' => false,
				'message' => "Sin Registros",
				'error'	  => [
					'description' => "Ingrese datos para poder realizar la inserccion de registros",
					'result' 	  => $datos
				 ]
			]

		];
            return $errors[$id];
	
	}






}
