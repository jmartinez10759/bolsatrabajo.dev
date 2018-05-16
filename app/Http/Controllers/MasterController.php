<?php

namespace App\Http\Controllers;

use App\Model\MasterModel;
use GuzzleHttp\Client;
use App\Model\SdeRolMenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;

class MasterController extends MenuController
{

	public static $_client;
    public $_tipo_user;
    public static $_domain = "";
    protected $_tipo = "application/json";
    public $_http;
    public static $_model;
    protected static $message_success;
    protected static $message_error;
    protected static $ssl_ruta = [];

    public function __construct(){
        
        #self::$ssl_ruta = ["verify" => $_SERVER['DOCUMENT_ROOT']. "/cacert.pem"];
        self::$ssl_ruta = ["verify" => false ];
        self::$_client = new Client( self::$ssl_ruta );
        self::$_domain = domain();
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

    }
    /**
     *Metodo general para consumir endpoint utilizando una clase de laravel
     *@access protected
     *@param  url [description]
     *@param  header [description]
     *@param  data [description]
     *@return json [description]
     */
    protected static function endpoint( $url = false, $headers = [], $data = [], $method=false ){
            
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
	/**
	 *Metodo para mandar a cargar el menu dependiendo el rol desempeñado por el usuario
	 *@access public
	 *@param array $data [ Description ]
	 *@return void
	 */
	protected static function menus( $data = [] ){
		
		#$response = self::$_model::show_model([], $data , new SdeRolMenuModel);
		$response = SdeRolMenuModel::with('menu')->where( $data  )->get();
		#$response = SdeRolMenuModel::find( $data['id_rol'] );
		debuger( $response->toArray() );

	}




}
