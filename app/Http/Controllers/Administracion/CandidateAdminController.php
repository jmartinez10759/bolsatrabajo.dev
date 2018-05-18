<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
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
    	#debuger($candidatos);
    	$data = [
    		'menu' 		   => self::menus( [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ] )
    		,'detalles'    => $candidatos
    		,'total'       => count($candidatos)
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

    	$candidatos = array_to_object(RequestUserModel::with('description')->where(['id_rol' => 2])->get()->toArray());
    	if ( $candidatos ) {
    		#mandar aqui toda la informacion detalles y usuarios

    		return message( true,$candidatos,self::$message_success );
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
		#debuger($consulta);
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
        $request_users['remember_token'] 	= str_random(50);
		$request_users['api_token'] 		= str_random(50);
		$request_users['id_rol'] 			= 2;
		$request_users['password'] 			= sha1( $request->password );
		$request_users['status'] 			= 1;
		$request_users['confirmed'] 		= true;
		$request_users['confirmed_code'] 	= null;
		$request_users['confirmed_nss']  	= !is_null($request->confirmed_nss)? $request->confirmed_nss :0;
        #debuger($request_users);
        $select_details = self::$_model::show_model([],['curp' => $blm_details['curp'] ], new DetailCandidateModel);
        if ( !$select_details ) {
        		$insert_users = self::$_model::create_model( [$request_users],new RequestUserModel );
	        if ( $insert_users ) {
	        	$blm_details['id_state'] = 1;
	        	$blm_details['id_users'] = $insert_users[0]->id;
        		$insert = self::$_model::create_model([$blm_details],new DetailCandidateModel);
        		if( $insert ){
	            	return message(true,$insert[0],"¡Transaccion Exitosa!");
        		}else{
	            	return message(false,[],"¡Ocurrio un error, favor de verificar.!");
        		}
	        }else{
	            return message(false,[],"¡Ocurrio un error, favor de verificar.!"); 
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

    	debuger( $request->all() );

    }
    



}
