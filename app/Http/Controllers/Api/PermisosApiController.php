<?php

namespace App\Http\Controllers\Api;

use App\Model\MasterModel;
use Illuminate\Http\Request;
use App\Model\SdePermisosModel;
use App\Http\Controllers\Controller;

class PermisosApiController extends MasterApiController
{
    
    
    private $_id = "id";
    private $_model;
    
    /**
     *Se genera un constructor para inicializar todas sus propiedades de la clase padre 
     *@access public
     */
    public function __construct(){
    	parent::__construct();	
    	$this->_model = new SdePermisosModel;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        #se manda a llamar el metodo para hacer la validacion de los permisos.
        #return self::validate_permisson($this->_id,[],$request);
    
    }
    /**
     *Metodo para obtener todos los registros de los proyectos
     *@access public 
     *@return json
     */
    public function all(){

        $response = ( $this->master::show_model([],[], $this->_model ) )? $this->_message_success(200, $this->master::show_model([],[], $this->_model ) ) :$this->show_error(4);
        return $response;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request ){
    	
        if (isset($request->data)) {
            $datos = self::parse_register([$request->data], $this->_model );
            if( isset($datos['success']) && $datos['success'] == false ){
                return self::show_error(3,$datos['result']);
            }
            $response = array_to_object( $this->permisson( $request->data ) );
            #debuger($response);
            if ( $response->success  == true ) {            	
                return $this->_message_success(201, object_to_array( $response->result) );
            }

        } 

        return $this->show_error(1);
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permisson( $datos ){

        $response = MasterModel::show_model([],$datos, $this->_model );
        if ( $response ) {
        	$permisos = [];
        	for ($i=0; $i < count($response); $i++) { 
	        	
	        	foreach ($response[$i] as $key => $value) {
	        		if ($key == "clave_corta") {
	        			$permisos[] = $value;
	        		}
	        		
	        	}

        	}
        	#debuger($permisos);
            return ['success' => true,'result' => $permisos ];
        }
        return ['success' => false,'result' => $response ];

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request ){

        if( isset( $request->data['email'] ) && $request->data['email'] != null ){
            
            $where = ['email' => $request->data['email'] ];
            $response = MasterModel::update_model($where, ['api_token' => str_random(50)], $this->_model );
            if ( $response) {
                return $this->_message_success(202,$response);
            }

        }  

        return $this->show_error(3);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if( !empty( $id ) ){

            $where = [$this->_id => $id];
            $update = ['status' => 0 ];
            $response = MasterModel::update_model( $where, $update, $this->_model );
            if ( sizeof( $response) > 0) {
                return $this->_message_success(202,$response);
            }

        }   

        return $this->show_error(3);
    
    }
}
