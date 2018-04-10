<?php

namespace App\Http\Controllers\Candidatos;

use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Model\DetailCandidateModel;
use Illuminate\Support\Facades\Session;
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
    	
    	$data = [
    		'nombre_completo' =>  Session::get('name')." ".Session::get('first_surname')
    		,'photo_profile'  =>  ( Session::get('profile') != false )? Session::get('profile'): asset('images/profile/profile.png')
    		,'activo'		  =>  ( Session::get('status') != false )? "Activo": "Desactivado"
    		,'postulaciones'  =>  1
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
    	$response = self::$_model::show_model( [], $where, new DetailCandidateModel);
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
				,'nss' 				=> ""
				,'cargo' 			=> ""
				,'descripcion' 		=> ""
				,'id_state' 	    => 1
    		];

    	}else{
    		$fields = [
    			'telefono' 			=> $response[0]->telefono
				,'codigo' 			=> $response[0]->codigo
				,'direccion' 		=> $response[0]->direccion
				,'curp' 			=> $response[0]->curp
				,'nss' 				=> $response[0]->nss
				,'cargo' 			=> $response[0]->cargo
				,'descripcion' 		=> $response[0]->descripcion
				,'id_state' 	    => $response[0]->id_state
    		];
    	}
    		$fields['name'] 			=  $data['name']; 
    		$fields['first_surname'] 	=  $data['first_surname'] ;
    		$fields['second_surname']   =  $data['second_surname'] ;
    		$fields['email'] 			=  $data['email'] ;
    		$fields['password'] 	    =  "" ;

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
    	foreach ($request->all() as $key => $value) {
    		
    		if ( $key == "name" || $key == "first_surname" || $key == "second_surname"  || $key == "email") {
    			$request_users[$key] = $value;
    		}
    		if ($key == "password" && $value != false) {
    			$request_users[$key] = sha1($value);
    			
    		}
    		if ( $key != "name" && $key != "first_surname" && $key != "second_surname"  && $key != "email" && $key != "password") {
    			$blm_details[$key] = $value;
    		}
    		

    	}
    	#se realiza el actualizado de los datos de la tabla del request_users
    	$where = ['id' => Session::get('id')];
    	$session = [];
    	$response = self::$_model::update_model( $where,$request_users , new RequestUserModel);
    	foreach ($response[0] as $key => $value) {
           $session[$key] = $value;
        }
    	if ( count( $response ) > 0 ) {

	    		Session::put( $session );
	    		$condicion = ['id_users' => Session::get('id') ];
	    		$response_details = self::$_model::show_model([],$condicion,new DetailCandidateModel);
	    		#debuger($response_details);
	    		if ( count($response_details) > 0 ) {
	    			#se realiza la actualizacion de los datos si es que tiene regitros la tabla.
	    			$update_details = self::$_model::update_model($condicion ,$blm_details,new DetailCandidateModel);
	    			return message( true,$update_details[0],"Trasaccion Exitosa");
	    		}
	    		#se realiza la parte de la inserccion de los datos en la tabla de detalles.
	    		$blm_details['id_users'] = Session::get('id');
	    		#debuger($blm_details);
	    		$insert = self::$_model::insert_model([$blm_details],new DetailCandidateModel);
	    		if (count($insert) > 0) {
	    			return message(true,$insert[0],"Trasaccion Exitosa");
	    		}else{
	    			return message(false,[],"Ocurrio un error");	
	    		}
	    }
	    

    }



}
