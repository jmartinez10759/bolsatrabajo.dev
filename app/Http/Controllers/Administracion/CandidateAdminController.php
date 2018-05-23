<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Model\BlmEstadosModel;
use App\Model\RequestUserModel;
use App\Model\DetailCandidateModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class CandidateAdminController extends MasterController
{

    public function __construct(){
    	parent::__construct();
    }
    /**
     *Se carga la vista listando los candidatos para agregar y actualizar
     *@access public
     *@return void
     */
    public function index(){
    	$candidatos = array_to_object(RequestUserModel::with('description')->where(['id_rol' => 2])->get()->toArray());
    	$estados =  self::$_model::show_model( [], [], new BlmEstadosModel);
    	$data = [
    		'menu' 		     => self::menus( [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ] )
    		,'detalles'    => $candidatos
    		,'total'       => count($candidatos)
    		,'estados'     => $estados
    	];

    	return view('administracion.candidatosAdmin',$data);

    }
    /**
     *Metodo donde se carga la informacion de los datos.
     *@access public
     *@param Request $request [ description ]
     *@return json
     */
    public static function show(){

        $candidatos = RequestUserModel::with('description')->where(['id_rol' => 2])->get();
        $usuarios  =  RequestUserModel::where(['id_rol' => 2])->paginate(4);
        #debuger($candidatos[0]->description);
      	$fields = [];
      	if ( $candidatos ) {
      		#mandar aqui toda la informacion detalles y usuarios
      		$claves_users = ['id','id_rol' ,'name','first_surname','second_surname','email'];
      		$claves_details = ['id_users','created_at','updated_at'];

      		foreach ( $candidatos as $candidato ) {
      			$fields[] = [
                  'id'				        => $candidato->id
                  ,'id_rol' 			    => $candidato->id_rol
                  ,'name' 			      => $candidato->name
                  ,'first_surname' 	  => $candidato->first_surname
                  ,'second_surname' 	=> $candidato->second_surname
                  ,'email'	    	    => $candidato->email
                  ,'status'			      => $candidato->status
                  ,'id_state'			    => isset($candidato->description[0]->id_state)?$candidato->description[0]->id_state :""
                  ,'telefono'			    => isset($candidato->description[0]->telefono)?$candidato->description[0]->telefono :""
                  ,'codigo'			      => isset($candidato->description[0]->codigo)?$candidato->description[0]->codigo :""
                  ,'direccion'		    => isset($candidato->description[0]->direccion)?$candidato->description[0]->direccion :""
                  ,'curp'				      => isset($candidato->description[0]->curp)?$candidato->description[0]->curp :""
                  ,'cargo'			      => isset($candidato->description[0]->cargo)?$candidato->description[0]->cargo :""
                  ,'descripcion'		  => isset($candidato->description[0]->descripcion)?$candidato->description[0]->descripcion :""
                  ,'photo'			      => isset($candidato->description[0]->photo)?$candidato->description[0]->photo : asset('images/profile/profile.png')

      			];

      		}
          #debuger($fields);
      		return message( true,$fields,self::$message_success );
      	}
      	return message( false,[],self::$message_error );

    }
    /**
     *Metodo donde se genera la carga de los datos
     *@access public
     *@param Request $request [ description ]
     *@return json
     */
    public static function create( Request $request ){

        $request_users = [];
        $blm_details = [];
        #se realiza la validacion si existe el email
        $where['email'] = $request->email;
    		$consulta = self::$_model::show_model([], $where , new RequestUserModel );
    		if( count( $consulta ) > 0 ){
    			return message(false,[],"Registro del candidato existente");
    		}
        #se realiza la validacion de NSS
        /* if ( $request->confirmed_nss == 1 ) {
                $blm_nss = self::$_model::show_model( [], ['id_users' => Session::get('id')], new BlmNssModel);

                if ( !$blm_nss ) {
                    return message(false,[],'¡Debe de Agregar al menos un NSS!');
                }

            }*/
        $claves_users = ['name','first_surname','second_surname','email','confirmed_nss'];
        $claves_details = ['name','first_surname','second_surname','email','password','nss','confirmed_nss'];
        $claves_upper = ['direccion','cargo','curp'];
        foreach ( $request->all() as $key => $value ) {

            if ( in_array($key, $claves_users) ) {
                if ($key == "email") {
                    $request_users[$key] = $value;
                }else{
                    $request_users[$key] = strtoupper($value);
                }
            }
            if ($key == "password" && $value != false) {
                $request_users[$key] = sha1($value);

            }
            if( !in_array($key, $claves_details) ){
                $blm_details[$key] = $value;
            }
            if (in_array($key, $claves_upper)) {
                $blm_details[$key] = strtoupper($value);
            }

        }
        $request_users['remember_token'] 	= str_random(50);
    		$request_users['api_token'] 		= str_random(50);
    		$request_users['id_rol'] 			= 2;
    		$request_users['password'] 			= sha1( $request->password );
    		$request_users['status'] 			= 1;
    		$request_users['confirmed'] 		= true;
    		$request_users['confirmed_code'] 	= null;
    		$request_users['confirmed_nss']  	= !is_null($request->confirmed_nss)? $request->confirmed_nss : 0;

        $select_details = self::$_model::show_model([],['curp' => $blm_details['curp'] ], new DetailCandidateModel);

        if ( !$select_details ) {
        		$insert_users = self::$_model::create_model( [$request_users],new RequestUserModel );
	        if ( $insert_users ) {
	        	$blm_details['id_state'] = 1;
                $blm_details['id_users'] = $insert_users[0]->id;
                $insert_details = self::$_model::create_model([$blm_details],new DetailCandidateModel);
                #debuger($insert_details);
        		if( $insert_details ){
	            	return message(true,$insert_details[0],self::$message_success );
        		}else{
	            	return message( false,[],self::$message_error );
        		}
	        }else{
	            return message(false,[],self::$message_error);
	        }

        }
            return message(false,[],"¡Ya existe la CURP que intenta agregar!");


    }
    /**
     *Metodo donde se genera la carga de los datos
     *@access public
     *@param Request $request [ description ]
     *@return json
     */
    public static function update( Request $request ){

    	#debuger( $request->all() );
      	$request_users = [];
      	$blm_details = [];
      	$claves_users = ['id', 'name','first_surname','second_surname','email','confirmed_nss'];
        $claves_details = ['name','first_surname','second_surname','email','password','nss','confirmed_nss'];
        $claves_upper = ['direccion','cargo','curp'];
        foreach ($request->all() as $key => $value) {

            if ( in_array($key, $claves_users) ) {
                if ($key == "email") {
                    $request_users[$key] = $value;
                }else{
                    $request_users[$key] = strtoupper($value);
                }
            }
            if ($key == "password" && $value != false) {
                $request_users[$key] = sha1($value);

            }
            if( !in_array($key, $claves_details) ){
                $blm_details[$key] = $value;
            }
            if (in_array($key, $claves_upper)) {
                $blm_details[$key] = strtoupper($value);
            }

        }
        $where = [ 'id' => $request_users['id'] ];
        $response_users = self::$_model::update_model( $where ,$request_users , new RequestUserModel);
        #debuger($response_details);
        if( $response_users ){
            $where = ['id_users' => $response_users[0]->id ];
            $select_details = self::$_model::show_model([],$where, new DetailCandidateModel);
            if($select_details){
                $response_details = self::$_model::update_model( ['id_users' => $blm_details['id']],$blm_details , new DetailCandidateModel);
            }else{
                $blm_details['id_users'] = $response_users[0]->id;
                $response_details = self::$_model::create_model([$blm_details],new DetailCandidateModel);
            }

        	return message(true,$response_details,"Actualizacion Exitosa");
        }


    }
    /**
     *Metodo para eliminar el dato de los candidatos
     *@access public
     *@param integer $id [description]
     *@return json
     */
    public static function destroy( $id ){

        $where = ['id' => $id];
        $delete_usuario = self::$_model::delete_model( $where, new RequestUserModel);
        if( !$delete_usuario){
            $details_delete = self::$_model::delete_model( ['id_users' => $id ], new DetailCandidateModel);
            if( !$details_delete){
                return message(true,[],"Se elimino correctamente el Candidato");
            }
            return message(false,[],self::$message_error);
        }
    }


}
