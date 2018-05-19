<?php

namespace App\Http\Controllers\Candidatos;

use App\Model\BlmNssModel;
use App\Model\RequestUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class NssController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
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

    	#se realiza la validacion de NSS
    	if ( Session::get('confirmed_nss') == 1 ) {
    		if ( empty($request->nss) ) {
    			return message(false,[],'No puede estar Vacio el campo de NSS.');
    		}
    		
    	}
    	$fields = [
    		'id_users' 	=> Session::get('id')
    		,'nss' 		=> $request->nss
    	];
        #debuger($request->nss);
        ####Update en la tabla request_users-->confirmed_nss a 1
        $iduser = Session::get('id');
        $passport= RequestUserModel::find($iduser);
        $passport->confirmed_nss=1;
        $passport->save();

        $response_nss 	= self::$_model::show_model([],[ 'nss' => $request->nss ],new BlmNssModel);
    	if ($response_nss) {
    		return message(false,[],"¡Ya se encuentra registrado este NSS.!");
    	}
    	$insert_nss 	= self::$_model::create_model([$fields],new BlmNssModel);
    	if ($insert_nss) {
            #update de confirned_nss a la tabla request 
    		return message(true,$insert_nss,"¡Trasaccion Existosa.!");
    	}

    	return message(false,[],"Ocurrio un Error. Favor de Verificar");


    }
    /**
     *Metodo para la actualizacion de los registros
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function update( Request $request){

    	#se realiza la validacion de NSS
    	if ( Session::get('confirmed_nss') == 1 ) {
    		if ( empty($request->nss) ) {
    			return message(false,[],'No puede estar Vacio el campo de NSS.');
    		}
    		
    	}
    	$fields = [
    		'id_users' 	=> Session::get('id')
    		,'nss' 		=> $request->nss
    	];
    	$response_nss 	= self::$_model::show_model([],[ 'nss' => $request->nss ],new BlmNssModel);
    	#debuger($response_nss);
    	if ($response_nss) {
    		return message(false,[],"¡Ya se encuentra registrado este NSS.!");
    	}
    	$update_nss 	= self::$_model::update_model(['id' => $request->id ],$fields,new BlmNssModel);
    	if ($update_nss) {
    		return message(true,$update_nss,"¡Trasaccion Existosa.!");
    	}

    	return message(false,[],"Ocurrio un Error. Favor de Verificar");


    }
    /**
     *Metodo para borrar el registro
     *@access public
     *@param $id [Description]
     *@return void
     */
    public static function destroy( $id ){

    	$where = ['id' => $id];
    	$response = self::$_model::delete_model($where, new BlmNssModel );
    	if (!$response) {
    		return message(true,$response,'¡Registro eliminado correctamente.!');
    	}else{
    		return message(false,[],'!Ocurrio un error, favor de verificar.!');
    	}
    	
    }



}
