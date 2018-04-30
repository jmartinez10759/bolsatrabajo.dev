<?php

namespace App\Http\Controllers\Candidatos;

use App\Model\BlmNssModel;
use Illuminate\Http\Request;
use App\Model\BlmEstadosModel;
use App\Model\JobsOffersModel; #tabla buro
use App\Model\RequestUserModel;
use App\Model\BlmCurriculumModel;
use App\Model\DetailCandidateModel;
use Illuminate\Support\Facades\Session;
use App\Model\BlmPostulateCandidateModel;
use App\Http\Controllers\MasterController;

class DetailCandidateController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para obtener la vista de los detalles del candidato que se registro al portal.
     *@access public 
     *@return void
     */
    public static function index(){

    	$where = ['id_users' => Session::get('id') ];
    	$postulaciones  =  self::$_model::show_model( [], $where, new BlmPostulateCandidateModel);
    	$curriculum   	=  self::$_model::show_model( [], $where, new BlmCurriculumModel);
        $details        =  self::$_model::show_model( [], $where, new DetailCandidateModel);        

    	$data = [
    		'nombre_completo' =>  Session::get('name')." ".Session::get('first_surname')
    		,'photo_profile'  =>  ( Session::get('profile') != false )? Session::get('profile'): asset('images/profile/profile.png')
    		,'activo'		  =>  ( Session::get('status') != false )? "Activo": "Desactivado"
    		,'postulaciones'  =>  count($postulaciones)
    		,'curriculum'  	  =>  ( $details || count($curriculum) )? 'style=display:block' : 'style=display:none'
    	];

    	return view('candidato.detailCandidato',$data);

    }
    /**
     *Metodo para realizar la consulta de los datos del usuario logueado
     *@access public
     *@param Request $request
     *@return void
     */
    public static function show(){

    	$where = ['id_users' => Session::get('id')];
    	$response  		=  self::$_model::show_model( [], $where, new DetailCandidateModel);
    	$postulaciones  =  BlmPostulateCandidateModel::where($where)->paginate(3);
    	$candidato 		=  self::$_model::show_model( [], ['id' => Session::get('id')], new RequestUserModel);
    	$estados   		=  self::$_model::show_model( [], [], new BlmEstadosModel);
    	$blm_nss   		=  self::$_model::show_model( [], $where, new BlmNssModel);
    	$data = [
    		'name' 				=>  Session::get('name')
			,'first_surname'	=>  Session::get('first_surname')
			,'second_surname'	=>  Session::get('second_surname')
			,'email' 			=>  Session::get('email')		
			#,'password' 		=>  Session::get('password')		
    	];
    	if ( count($response) == 0  ) {

    		$fields = [
    			'telefono' 			=> ""
				,'codigo' 			=> ""
				,'direccion' 		=> ""
				,'curp' 			=> ""				
				,'cargo' 			=> ""
				,'descripcion' 		=> ""
				,'id_state' 	    => 9
    		];

    	}else{
    		$fields = [
    			'telefono' 			=> $response[0]->telefono
				,'codigo' 			=> $response[0]->codigo
				,'direccion' 		=> $response[0]->direccion
				,'curp' 			=> $response[0]->curp
				,'cargo' 			=> $response[0]->cargo
				,'descripcion' 		=> $response[0]->descripcion
				,'id_state' 	    => $response[0]->id_state
    		];
    	}
    		$fields['name'] 			=  $data['name']; 
    		$fields['first_surname'] 	=  $data['first_surname'] ;
    		$fields['second_surname']   =  $data['second_surname'] ;
    		$fields['email'] 			=  $data['email'] ;
    		$fields['confirmed_nss'] 	=  $candidato[0]->confirmed_nss;
    		$fields['password'] 	    =  "" ;
    		$fields['estados'] 	    	=  $estados;
    		$fields['nss'] 				=  $blm_nss;
    		$fields['postulaciones'] 	=  self::_postulaciones( $postulaciones );
    		$fields['pagination'] 	    =  [
    			 'total'         => $postulaciones->total()
                ,'current_page'  => $postulaciones->currentPage()
                ,'per_page'      => $postulaciones->perPage()
                ,'last_page'     => $postulaciones->lastPage()
                ,'from'          => $postulaciones->firstItem()
                ,'to'            => $postulaciones->lastItem()
    		];

    		#debuger($fields['pagination']);
    	return message(true, $fields , 'Trasaccion exitosa');


    }
    /**
     *Metodo para insertar y/o actualizar los datos del candidato
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    public static function store( Request $request ){

    	$request_users = [];
    	$blm_details = [];
    	#se realiza la validacion de NSS
    	if ( Session::get('confirmed_nss') == 1 ) {
    		$blm_nss = self::$_model::show_model( [], ['id_users' => Session::get('id')], new BlmNssModel);
    		
    		if ( !$blm_nss ) {
    			return message(false,[],'¡Debe de Agregar al menos un NSS!');
    		}
    		
    	}
    	$claves_users = ['name','first_surname','second_surname','email'];
    	$claves_details = ['name','first_surname','second_surname','email','password','nss'];
    	foreach ($request->all() as $key => $value) {

    		if (in_array($key, $claves_users)) {
    			$request_users[$key] = $value;
    		}
    		if ($key == "password" && $value != false) {
    			$request_users[$key] = sha1($value);
    			
    		}
			if( !in_array($key, $claves_details) ){
				$blm_details[$key] = $value;
			}    		

    	}
        #debuger($blm_details);
    	#se realiza el actualizado de los datos de la tabla del request_users
    	$where = ['id' => Session::get('id')];
    	$session = [];
    	$response = self::$_model::update_model( $where,$request_users , new RequestUserModel);
    	foreach ($response[0] as $key => $value) {
           $session[$key] = $value;
        }
    	if ( $response ) {
    			
    		Session::put( $session );
    		$condicion = ['id_users' => Session::get('id'), 'curp' => $blm_details['curp'] ];
    		$response_details = self::$_model::show_model([],$condicion,new DetailCandidateModel);
    		if ( $response_details ) {
    			#se realiza la actualizacion de los datos si es que tiene regitros la tabla.
    			$update_details = self::$_model::update_model($condicion ,$blm_details,new DetailCandidateModel);
    			return message( true,$update_details[0],"¡Trasaccion Exitosa!");
    		}
    		#se realiza la parte de la inserccion de los datos en la tabla de detalles.
    		$blm_details['id_users'] = Session::get('id');
    		#debuger($blm_details);
    		$select_details = self::$_model::show_model([],['curp' => $blm_details['curp'] ], new DetailCandidateModel);

    		if ( !$select_details ) {
    			$insert = self::$_model::create_model([$blm_details],new DetailCandidateModel);
	    		
	    		if ( $insert) {
	    			return message(true,$insert[0],"¡Trasaccion Exitosa!");
	    		}else{
	    			return message(false,[],"¡Ocurrio un error!");	
	    		}
    			
    		}
    			return message(false,[],"¡Ya existe la CURP que intenta agregar!");

	    }
	    

    }
    /**
     *Metodo para hacer la consulta de la vacante 
     *@access private
     *@param $request [Description]
     *@return void
     */
    private static function _postulaciones( $request ){
    	
    	$postulacion = [];
    	if ( !$request ) {
    		return $postulacion;
    	}
    	for ($i=0; $i < count( $request ); $i++) {
    		$where = ['id' => $request[$i]->id_vacante];
    		$postulacion[] = self::$_model::show_model([],$where,new JobsOffersModel)[0];
    		#$postulacion[] = JobsOffersModel::where($where)->paginate(3);
    	}
    	return $postulacion;

    }
     /**
     *Metodo para insertar el numero de seguro social. 
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    /*public static function store_nss( Request $request ){
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
    	if ($response_nss) {
    		return message(false,[],"¡Ya se encuentra registrado este NSS.!");
    	}
    	$insert_nss 	= self::$_model::create_model([$fields],new BlmNssModel);
    	if ($insert_nss) {
    		return message(true,$insert_nss,"Trasaccion Existosa");
    	}

    	return message(false,[],"Ocurrio un Error. Favor de Verificar");



    }*/


}
