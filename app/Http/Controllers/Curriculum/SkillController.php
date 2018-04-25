<?php

namespace App\Http\Controllers\Curriculum;

use Illuminate\Http\Request;
use App\Model\BlmSkillModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class SkillController extends MasterController
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
        #debuger( $data );
        $response = self::$_model::create_model([$data], new BlmSkillModel);

        if (count($response) > 0) {
            return message(true,$response[0],"Transaccion Exitosa");
        }else{
            return message(false,[],"Ocurrio Un Error");
        }

    }
    /**
     *Metodo para la actualizacion de los campos 
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function update( Request $request ){

    	$where = ['id' => $request->id];
    	$response = self::$_model::update_model( $where, $request->all(), new BlmSkillModel);
    	if (count($response) > 0 ) {
    		return message(true, $response[0], "Actualizacion Correcta");
    	}else{
    		return message(false, $response[0], "Ocurrio un error");
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
    	$response = self::$_model::delete_model($where, new BlmSkillModel );
    	if (count( $response ) == 0) {
    		return message(true,$response,'Registro eliminado correctamente');
    	}else{
    		return message(false,[],'Ocurrio un error');
    	}

    }	



}
