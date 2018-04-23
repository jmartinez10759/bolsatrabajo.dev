<?php

namespace App\Http\Controllers\Postulacion;

use App\Listado;
use App\Model\PersonModel; #tabla de buro
use Illuminate\Http\Request;
use App\Model\AccountsModel; #tabla buro
use App\Model\CandidatoModel; #tabla buro
use App\Model\RequestUserModel;
use App\Model\BlmCurriculumModel;
use App\Model\DetailCandidateModel;
use App\Model\AccountsPersonsModel; #tabla buro
use Illuminate\Support\Facades\Session;
use App\Model\SocialSecurityNumberModel; #tabla buro
use App\Model\BlmPostulateCandidateModel;
use App\Http\Controllers\MasterController;


class PostulacionController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para la inserccion de los datos en las tablas de Buro Laboral Mexico
     *@access public
     *@param Request $request [description]
     *@return void
     */
    public static function store( Request $request ){
    	
    	#se realiza la consulta a la tabla de postulaciones
    	$where = ['id_users' => Session::get('id'), 'id_vacante' => $request->id_vacante];
    	$postulaciones = self::$_model::show_model([],$where, new BlmPostulateCandidateModel);
    	if ($postulaciones) {
    		return message(false,[],"Ya te has postulado para esta vacante");
    	}
    	$users_cv = self::$_model::show_model([],['id_users' => Session::get('id')], new BlmCurriculumModel);
	    if (!$users_cv) { return message(false,[],"Por Favor Ingresar datos en su Curriculum."); }
	    
    	$insert_postulacion = self::$_model::create_model([$where], new BlmPostulateCandidateModel);
    	$users = self::$_model::show_model(['name','first_surname','second_surname'],[ 'id' => Session::get('id') ], new RequestUserModel)[0];
    	$desc_users =  self::$_model::show_model([],['id_users' => Session::get('id')], new DetailCandidateModel)[0];
    	#se realiza una consulta si existe la curp en la PersonModel
    	$response_curp = self::$_model::show_model([],['curp' => $desc_users->curp], new PersonModel);
    	if ( $response_curp ) {
    		return message(true,$response_curp,"Postulacion Exitosa");
    	}
    	#insertar los datos en la tabla persons
    	$insert_persons = self::store_persons( $desc_users, $users );

    	if ( $insert_persons ) {

    		$insert_nss = self::store_social_security_numbers( $insert_persons, $desc_users );

    		if ( $insert_nss ) {
    			
    			$account_person_insert = self::store_accounts_persons($insert_persons,$request,$users_cv,$desc_users );
	    		if ( $account_person_insert  ) {
	    			#se inserta en las tablas de employees y candidate
	    			$insert_candidate = self::store_candidates( $account_person_insert );

	    			if ( $insert_candidate ) {
	    				return message(true,$insert_candidate,"Postulacion Exitosa");
	    				
	    			}

	    			return message(false, [], "Ocurrio un Error al Postularse");

	    		}else{
	    			#segundo if de account_person
	    			return message( false,[],'Ocurrio un Error Favor de Verificar');

	    		}

    		}else{
    			#else de nss
    			return message(false, [], "Ocurrio un Error al Postularse");
    		}
    		
    	}else{
    		#primer if de persons
    		return message( false,[],'Ocurrio un Error Favor de Verificar');
    	}


    }
    /**
     *Metodo para insertar los registros 
     *@access public 
     *@return array [Description]
     */
    public static function store_persons( $desc_users, $users ){
    	#arreglo para almacenar los registros para la tabla de persons
    	$data_table_person = [];
    	$key_person = ['name','first_surname','second_surname'];
    	$key_persons_details = ['curp'];
    	
    	foreach ($users as $key => $value) {
    		if ( in_array( $key, $key_person ) ) {
    			$data_table_person[$key] = $value;
    		}
    	}
    	foreach ($desc_users as $key => $value) {
    		if ( in_array($key, $key_persons_details ) ) {
    			$data_table_person[$key] = $value;
    		}
    	}
    	$data_table_person['state_id'] = $desc_users->id_state;

    	return self::$_model::insert_model( [$data_table_person] ,new PersonModel)[0];

    }
    /**
     *Metodo para insertar los registros social_security_numbers
     *@access public
     *@return array [Description]
     */
    public static function store_social_security_numbers( $insert_persons, $desc_users ){

    	$data_nss = [
			'person_id' 			=> $insert_persons->id
			,'nss' 					=> $desc_users->nss
			,'is_wrong_nss' 		=> null
			,'created_by_user_id'	=> null
			,'account_id' 			=> null
			,'is_deleted'			=> null
			,'is_locked' 			=> null
		];
		return self::$_model::insert_model( [$data_nss], new SocialSecurityNumberModel )[0];

    }
    /**
     *Metodo para insertar los registros accounts_persons
     *@access public 
     *@param $insert_persons [description]
     *@param $request [description]
     *@param $users_cv [description]
     *@param $desc_users [description]
     *@return array [Description]
     */
    public static function store_accounts_persons( $insert_persons, $request, $users_cv, $desc_users ){

    	$list_vacantes = self::$_model::show_model(['account_id'],['id' => $request->id_vacante], new Listado)[0];
		#se realiza la inserccion a la tabla de accounts_persons
		$data_accounts_persons = [
			'person_id' 			=> $insert_persons->id
			,'account_id' 			=> $list_vacantes->account_id
			,'type_id' 				=> null
			,'blood_type_id' 		=> null
			,'state_id' 			=> $users_cv->id_state
			,'marital_status_id' 	=> null
			,'image_file_name' 		=> null
			,'phone_number' 		=> $users_cv->telefono
			,'mobile_phone_number' 	=> $users_cv->telefono
			,'street' 				=> null
			,'neighborhood' 		=> null
			,'municipality' 		=> null
			,'postal_code' 			=> $desc_users->codigo
			,'email' 				=> $users_cv->email
			,'is_wrong_email' 		=> null
			,'website_url' 			=> null
			,'facebook_url' 		=> null
			,'linkedin_url' 		=> null
			,'googleplus_url' 		=> null
			,'skype_url' 			=> null
			,'twitter_url' 			=> null
			,'youtube_url' 			=> null
			,'is_deleted' 			=> null
			,'created' 				=> null
			,'modified' 			=> null
		];
		return self::$_model::insert_model([$data_accounts_persons],new AccountsPersonsModel)[0];

    }
    /**
     *Metodo para insertar los registros candidates
     *@access public 
     *@param $request [description]
     *@return array [Description]
     */
    public static function store_candidates( $account_person_insert ){

    	$data_candidate = [
			'account_person_id'		=> $account_person_insert->id
			,'user_id'				=> null
			,'assigned_to_user_id'	=> null
			,'candidate_source_id'	=> null
			,'mark_id'				=> null
			,'photo_dir'			=> null
			,'photo'				=> null
			,'score'				=> null
			,'is_filed'				=> null
			,'deleted'				=> null
			,'created'				=> null
			,'modified'				=> null
		];
		#$data_employee = [];
		return self::$_model::insert_model([$data_candidate], new CandidatoModel)[0];

    }




}
