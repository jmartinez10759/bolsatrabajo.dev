<?php

namespace App\Http\Controllers\Curriculum;

use Illuminate\Http\Request;
use App\Model\BlmStudyModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class StudyController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para insertar los datos de estudios.
     *@access public
     *@param Request $request [description]
     *@return void
     */
    public static function store( Request $request ){
    	
        $data = [];
        foreach ($request->all() as $key => $value) {
            if ( $value != null ) {
                $data[$key] = $value;        
            }
        }
        $url            = self::$_domain."/api/bolsa/study";
        $headers        = [ 
            'Content-Type'  => 'application/json'
            ,'usuario'      => Session::get('email')
            ,'token'        => Session::get('api_token')
        ];
        $datos['data']  = $data;
        $method         = 'post';
        $response       = self::endpoint($url, $headers, $datos,$method);
                
        if ( $response->success == true ) {
            return message(true,$response->result,self::$message_success);
        }else{
            return message(false,[],self::$message_error);
        }

    }
    /**
     *Metodo para la actualizacion de los campos 
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function update( Request $request ){

    	$url            = self::$_domain."/api/bolsa/study";
        $headers        = [ 
            'Content-Type'  => 'application/json'
            ,'usuario'      => Session::get('email')
            ,'token'        => Session::get('api_token')
        ];
        $fields['data']  = $request->all();
        $method          = 'put';
        $response        = self::endpoint($url, $headers, $fields,$method);

        if ( $response->success == true ) {
            return message(true,$response->result,self::$message_success);
        }else{
            return message(false,[],self::$message_error);
        }

    }
    /**
     *Metodo para borrar el registro
     *@access public
     *@param Request $request [ Descripcion ]
     *@return void
     */
    public static function destroy( $id ){
    	
    	$where = ['id' => $id];
    	$response = self::$_model::delete_model($where, new BlmStudyModel );
    	if (count( $response ) == 0) {
    		return message(true,$response,'Registro eliminado correctamente');
    	}else{
    		return message(false,[],self::$message_error);
    	}


    }	


}
