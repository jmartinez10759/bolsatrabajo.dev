<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\Model\MasterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterApiController extends Controller
{
    
    public $_client;
	protected $_api; #propiedad
    protected $_permission; #propiedad
    protected $_url;
    protected $tipo = "application/json";
    protected $master;

    public function __construct(){
        $this->_client = new Client();
        $this->master = new MasterModel();
    }
    /**
     *Metodo para la validacion del token
     *@access public
     *@param array
     *@return 
     */
    public function validate_permisson( $indice = false ,$parametros = array(),$request=false ){
        #indice = id_de la tabla
        $datos          = self::parser_string();
        $server         = $_SERVER['REQUEST_METHOD'];
        $http_usuario   = isset( $_SERVER['HTTP_USUARIO'] )? $_SERVER['HTTP_USUARIO']:null;
        $http_token     = isset( $_SERVER['HTTP_TOKEN'] )? $_SERVER['HTTP_TOKEN']:null;

        $token = ( $http_token && $http_usuario )? self::token_validate([ 'email' => $http_usuario,'api_token' => $http_token]) : false;
        if ( isset( $token->success ) && $token->success == true ) {
    		
    		$permisson = self::permisson_validate( [ 'id_users' => $token->result[0]->id ] )->result;
    		#debuger(['CON']);
            switch ($server) {
                case 'GET':
                    if ( in_array( 'CON', $permisson )  ) {
                        if ( isset($parametros[$indice]) ) {
                            return $this->show( $parametros );
                        }
                        if ( isset($datos) && count($datos) > 0 ) {
                        	
                            return $this->show( $datos );
                        }
                            return $this->all();
                    }
                    	return $this->show_error(0);
                    break;
                
                case 'POST':
                    if ( in_array( 'INS' ,$permisson  ) ){
                        return $this->create($request);
                    }
		    			return $this->show_error(0);
                    break;

                case 'PUT':
                        $id = isset($request->data[$indice])? $request->data[$indice] :false;
                        if ( in_array( 'UPD' ,$permisson  ) ) {
                            return $this->update($request->data,$id);
                        }
						return $this->show_error(0);
                    break;

                case 'DELETE':
                        $id = isset($request->data[$indice])? $request->data[$indice] :false;
                        if ( in_array( 'DEL' ,$permisson  ) ){
                            return $this->destroy($id);
                        }
						return $this->show_error(0);
                    break;
                
            }

        }

        return $this->show_error(1); 
    
    }
     /**
     *Metodo para la validacion del token
     *@access protected
     *@param array
     *@return 
     */
    protected  function token_validate( $data = array() ){

        $this->_api = new TokenApiController();
        return array_to_object($this->_api->token( $data ));
    }
    /**
     *Metodo para la validacion de los permisos por cada usuario
     *@access protected
     *@param array data [description]
     *@return integer [regresa el numero de permiso solicitdo]
     */
    protected function permisson_validate( $data = [] ){
    	
        $this->_permission = new PermisosApiController();
        return array_to_object( $this->_permission->permisson( $data ) );        
    	return 1;

    }
    /**
     *Metodo donde muestra el mensaje de success
     *@access protected
     *@param integer $code [Envia la clave de codigo.]
     *@param array $data [envia la informacion correcta ]
     *@return json
     */
    protected function _message_success( $code = false, $data = array() ){

        $code = ( $code )? $code : 200 ;
        $datos = [
            "success"   => true,
            "message"   => "Transaccion exitosa.",
            "code"		=> "BLM-".$code."-".$this->setCabecera($code),
            "result"    => $data
        ];
        return response()->json($datos);
        #return json_encode($datos);
    
    }
    /**
     *Metodo para establecer si se realizo con exito la peticion
     *@access private 
     *@param $codigo [description]
     *@return string [description]
     */
    private function get_status_message( $codigo=false ) {

		    $estado = array(
		       200 => 'OK',
		       201 => 'Created',
		       202 => 'Accepted',
		       204 => 'No Content',
		       301 => 'Moved Permanently',
		       302 => 'Found',
		       303 => 'See Other',
		       304 => 'Not Modified',
		       400 => 'Bad Request',
		       401 => 'Unauthorized',
		       403 => 'Forbidden',
		       404 => 'Not Found',
		       405 => 'Method Not Allowed',
		       500 => 'Internal Server Error'
		   	);

		   return ($estado[$codigo]) ? $estado[$codigo] : $estado[500];

   	}
   	/**
	 *Se crea un metodo para mostrar los errores dependinedo la accion a realizar
	 *@access protected
	 *@param integer $id [ Coloca el indice para mandar el error que corresponde. ]
	 *@param array $datos [ Envia la informacion para pintar el error. ]
	 *@return string $errores
	 */
	protected function show_error( $id = false, $datos = array()) {

		$errors = [
			#0
			[
				'success' => false,
				'message' => "Acceso Denegado",
				'error'	  => [
					'description' => "No tiene permisos para realizar esta accion",
					'result' 	  => $datos,
					'code' 	=> "BLM-401-".$this->setCabecera(401)
				 ]

			],
			#1
			[
				'success' => false,
				'message' => "Error en la transaccion",
				'error'	  => [
					'description' => "Token expiro y/o cambio, favor de verificar."
					,'result' 	  => $datos
					,'code' 	  => "BLM-400-".$this->setCabecera(400)
					,'token' 	  => ""
				 ]

			],
			#2
			[
				'success' => false,
				'message' => "Peticion Incorrecta",
				'error'	  => [
					'description' => "El Servicio de Internet es Incorrecto",
					'result' 	  => $datos,
					'code' 	=> "BLM-500-".$this->setCabecera(500)
				 ]

			],
			#3
			[
				'success' => false,
				'message' => "Identificador diferente y/o vacio",
				'error'	  => [
					'description' => "Verificar los campos solicitados.",
					'result' 	  => $datos,
					'code' 	=> "BLM-204-".$this->setCabecera(204)
				 ]

			],
			#4
			[
				'success' => false,
				'message' => "Sin Registros",
				'error'	  => [
					'description' => "No se encontro ningun registro",
					'result' 	  => $datos,
					'code' 	=> "BLM-204-".$this->setCabecera(204)
				 ]
			],
			#5
			[
				'success' => false,
				'message' => "Sin Registros",
				'error'	  => [
					'description' => "Ingrese datos para poder realizar la accion",
					'result' 	  => $datos,
					'code' 	=> "BLM-204-".$this->setCabecera(204)
				 ]
			]

		];

        return response()->json($errors[$id]);
	
	}
    /**
    *Se crea un metodo en el cual se establece el formato en el que se enviara la informacion del REST
    *@access protected
    *@param $codigo int [description]
    *@return void
    */
    protected function setCabecera( $codigo ) {

        header("HTTP/1.1 " . $codigo . " " . $this->get_status_message($codigo));
        header("Content-Type:" . $this->tipo . ';charset=utf-8');
        return $this->get_status_message($codigo);
    
    }
    /**
     *Metodo donde parsea la cadena
     *@access public
     *@return array $datos [description]
     */
    public function parser_string(){

        $datos = [];
        if ($_SERVER['QUERY_STRING']) {
            $params = explode("&", $_SERVER['QUERY_STRING']);
            $params = implode("=", $params);
            $params = explode("=", $params);
            $i = 1;
            foreach ($params as $key => $value) {
                if ($key%2 == 0 ) {
                   $datos[$value] = $params[$i];
                }
                $i++;
            }
        }
        return $datos;
    
    }
    /**
     *Metodo para verificar si estan correctamete los valores ingresados
     *@access public 
     *@param $data array  [description]
     *@param $class object [description]
     *@return array
     */
    public function parse_register( $data = array(), $clase, $claves_date = []){

        $datos = [];
        #verifica que no vayan nulos los campos y si no estan nulos los regresa en un arreglo
        if ( count($data) > 0 ) {
            
            for ($i=0; $i < count($data); $i++) { 
                
                foreach ($data[$i] as $key => $value) {

                    if ($data[$i][$key] == null) {
                        return ['success' => false,'result' => $data[$i] ];
                    }
                    if ($value != false) {
                        $datos[$key] = $value;
                    }
                } 
                #se valida la fecha
                if ( $claves_date ) {

                    for ($j=0; $j < count($claves_date); $j++) { 
                        $validate_fecha = isset( $data[$i][$claves_date[$j]] )? $data[$i][$claves_date[$j]] : false;
                        $fecha = schema_fecha( $validate_fecha );
                        if ( isset($fecha['success']) && $fecha['success'] == false ) {
                            return ['success' => false,'result' => $claves_date[$j] ];        
                         }

                    }

                }

            }

        }
        #validaciones de datos diferentes.
        if ( array_diff( array_keys($datos), $clase->fillable) ) {
            return ['success' => false,'result' => array_values(array_diff( array_keys($datos), $clase->fillable))  ];
        }

        return $datos;

    }

   
}
