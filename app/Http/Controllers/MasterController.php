<?php

namespace App\Http\Controllers;

use App\Model\MasterModel;
use GuzzleHttp\Client;
use App\Model\SdeRolMenuModel;
use Illuminate\Http\Request;
#use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
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
	protected static function menus( $response ){

        $menus_array = [];
        $permisos = [];
        for ($i=0; $i < count( $response ); $i++) {
            for ($j=0; $j < count( $response[$i]->menu ); $j++) {
               $menus_array[] = $response[$i]->menu[$j];
            }

        }
        #self::$menu = self::build_menu( $menus_array );
        return self::build_menu( $menus_array );

	}
	/**
 *Metodo para cargar la vista general de la platilla que se va a utilizar
 *@access protected
 *@param string $view [Description]
 *@param array  $data [Description]
 *@return void
 */
	protected static function _load_view( $view = false, $parse = []){

				$where = [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ];
				$response = array_to_object(SdeRolMenuModel::with('menu','permisos','roles','detalles')->where( $where )->get()->toArray());
				$parse['MENU_DESKTOP'] 			= self::menus( $response );
				$parse['APPTITLE'] 					= utf8_decode('Solicitud de Empleo - BLM' );
        $parse['IMG_PATH']  				= domain().'images/';
				$parse['anio']							= date('Y');
				$parse['base_url']					= domain();
				$parse['nombre_completo']		= Session::get('name')." ".Session::get('first_surname');
				$parse['desarrollo'] 				= "Buro Laboral Mexico S.A C.V";
				$parse['link_desarrollo'] 	= "www.burolaboralmexico.com";
				$parse['welcome'] 					= "Bienvenid@";
				$parse['photo_profile'] 		= isset($response[0]->detalles[0]->photo)? $response[0]->detalles[0]->photo : asset('images/profile/profile.png');
				$parse['rol'] 							= isset($response[0]->roles[0]->perfil)? $response[0]->roles[0]->perfil : "Perfil";

				$parse['page_title'] 				= isset($parse['page_title'])? $parse['page_title']: " ";
				$parse['title'] 						= isset($parse['title'])? $parse['title'] : "";
				$parse['subtitle'] 					= isset($parse['subtitle'])? $parse['subtitle'] : "";

				#debuger($parse);
				return View( $view , $parse );

	}




}
