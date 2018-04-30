<?php

namespace App\Http\Controllers\Postulacion;

use App\Listado;
use App\Model\PersonModel; #tabla de buro
use Illuminate\Http\Request;
use App\Model\AccountsModel; #tabla buro
use App\Model\CandidatoModel; #tabla buro
use App\Model\BlmNssModel; #tabla buro
use App\Model\RequestUserModel;
use App\Model\BlmCurriculumModel;
use App\Model\DetailCandidateModel;
use App\Model\AccountsPersonsModel; #tabla buro
use Illuminate\Support\Facades\Mail;
use App\Model\CandidateJobOffersModel; #tabla buro
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
    	$users_cv = self::$_model::show_model([],['id_users' => Session::get('id')], new BlmCurriculumModel);
    	if ($postulaciones) {return message(false,[],"Ya te has postulado para esta vacante");}
	    if (!$users_cv) { return message(false,[],"Por Favor Ingresar datos en su Curriculum."); }
    	#obtengo los datos del usuario que se postula las tablas de bolsa.
    	$persons 	= self::$_model::show_model([],[ 'id' => Session::get('id') ], new RequestUserModel);
    	$desc_users = self::$_model::show_model([],['id_users' => Session::get('id')], new DetailCandidateModel);
    	$nss_bolsa  = self::$_model::show_model([],['id_users' => Session::get('id')], new BlmNssModel);
    	$response_curp = self::$_model::show_model([],['curp' => $desc_users[0]->curp], new PersonModel);
    	$list_vacantes = self::$_model::show_model([],['id' => $request->id_vacante], new Listado);
    	#debuger($persons);
        $insert_persons = self::store_persons( $response_curp, $desc_users, $persons );
    	if ( $insert_persons ) {

    		$insert_nss = self::store_social_security_numbers( $insert_persons, $nss_bolsa, $list_vacantes );
    		#if ( $insert_nss ) {
    			
    			$account_person_insert = self::store_accounts_persons($insert_persons,$list_vacantes,$users_cv,$desc_users );
	    		if ( $account_person_insert  ) {
	    			#se inserta en las tablas de employees y candidate
	    			$insert_candidate = self::store_candidates( $account_person_insert );

	    			if ( $insert_candidate ) {

	    				$insert_candidate_jobs = self::_store_candidate_jobs_offers( $insert_candidate, $request );

	    				if ($insert_candidate_jobs) {
		    				$data = ['id_users' => Session::get('id'), 'id_vacante' => $request->id_vacante];
	    					$insert_postulacion = self::$_model::create_model([$data], new BlmPostulateCandidateModel);
	    					if ($insert_postulacion) {

                                $postulate = [
                                    'name'              => $persons[0]->name
                                    ,'email'            => $persons[0]->email
                                    ,'name_vacante'     => $list_vacantes[0]->name
                                    ,'name_company'     => $list_vacantes[0]->title
                                ];
                                #envio de correo para validar si existe el correo antes ingresado.
                                Mail::send('emails.postulacion', $postulate, function($message) use ( $postulate ) {
                                    $message->to( $postulate['email'], $postulate['name'] )
                                            ->from('jorge.martinez@burolaboralmexico.com','Buro Laboral Mexico')
                                            ->subject('Postulacion exitosa');
                                });

		    					return message(true,$insert_postulacion,"¡Te has postulado exitosamente!");
	    						
	    					}else{
		    					return message(false,[],"¡Ocurrio un error postulate, favor de verificar!");
	    					}
	    					
	    				}
		    			return message(false,[],"¡Ocurrio un error candidate offers, favor de verificar!");
	    				
	    			}

	    			return message(false, [], "¡Ocurrio un error candidate, favor de verificar!");

	    		}else{
	    			#segundo if de account_person
	    			return message( false,[],'¡Ocurrio un Error account_person, favor de verificar!');

	    		}

    		/*}else{
    			#else de nss
    			return message(false, [], "¡Ocurrio un error nss, favor de verificar!");
    		}*/
    		
    	}else{
    		#primer if de persons
    		return message( false,[],'¡Ocurrio un error persons, favor de verificar!');
    	}


    }
    /**
     *Metodo para insertar los registros 
     *@access public 
     *@return array [Description]
     */
    public static function store_persons( $response_curp, $desc_users, $persons ){
    	#arreglo para almacenar los registros para la tabla de persons
    	$data_table_person = [];
    	$key_person = ['name','first_surname','second_surname'];
    	$key_persons_details = ['curp'];
    	
    	foreach ($persons[0] as $key => $value) {
    		if ( in_array( $key, $key_person ) ) {
    			$data_table_person[$key] = $value;
    		}
    	}
    	foreach ($desc_users[0] as $key => $value) {
    		if ( in_array($key, $key_persons_details ) ) {
    			$data_table_person[$key] = $value;
    		}
    	}
    	$data_table_person['state_id'] = $desc_users[0]->id_state;
    	#debuger($response_curp);
    	if ($response_curp) {
    		$where = ['id' => $response_curp[0]->id];
			return self::$_model::update_model( $where ,$data_table_person ,new PersonModel)[0];
    	}
		return self::$_model::insert_model( [$data_table_person] ,new PersonModel)[0];

    }
    /**
     *Metodo para insertar los registros social_security_numbers
     *@access public
     *@return array [Description]
     */
    public static function store_social_security_numbers( $insert_persons, $nss_bolsa, $list_vacantes ){
    	
    	$result = [];
    	if (!$nss_bolsa) {
    		return $result;		
    	}
    	#$where = ['account_id' => $list_vacantes[0]->id ,'person_id' => $insert_persons->id];
    	$where = ['person_id' => $insert_persons->id];
    	$response = self::$_model::show_model([],$where, new SocialSecurityNumberModel);
    	if ($response) {
    		$delete_nss = self::$_model::delete_model($where, new SocialSecurityNumberModel);
	    	if ($delete_nss) {
	    		return $result;
	    	}

    	}

    	for ($i=0; $i < count($nss_bolsa) ; $i++) {

    		$data_nss = [
				'person_id' 			=> $insert_persons->id
				,'nss' 					=> $nss_bolsa[$i]->nss
				,'is_wrong_nss' 		=> null
				,'created_by_user_id'	=> null
				,'account_id' 			=> $list_vacantes[0]->account_id
				,'is_deleted'			=> null
				,'is_locked' 			=> null
			];

    		$result[] = self::$_model::insert_model( [$data_nss], new SocialSecurityNumberModel );
    	
    	}

		return $result;
    
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
    public static function store_accounts_persons( $insert_persons, $list_vacantes, $users_cv, $desc_users ){
		#se realiza la inserccion a la tabla de accounts_persons
		$data_accounts_persons = [
			'person_id' 			=> $insert_persons->id
			,'account_id' 			=> $list_vacantes[0]->account_id
			,'type_id' 				=> null
			,'blood_type_id' 		=> null
			,'state_id' 			=> $users_cv[0]->id_state
			,'marital_status_id' 	=> null
			,'image_file_name' 		=> null
			,'phone_number' 		=> $users_cv[0]->telefono
			,'mobile_phone_number' 	=> $users_cv[0]->telefono
			,'street' 				=> null
			,'neighborhood' 		=> null
			,'municipality' 		=> null
			,'postal_code' 			=> $desc_users[0]->codigo
			,'email' 				=> $users_cv[0]->email
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
    /**
     *Metodo para insertar los registros candidates y ofertas
     *@access private 
     *@param $insert_candidate [description]
     *@param $request [description]
     *@return array [description]
     */
    private static function _store_candidate_jobs_offers( $insert_candidate, $request ){

    	$data_candidate_offers = [
			'candidate_id'				=> $insert_candidate->id
			,'job_offer_id'				=> $request->id_vacante
			,'recruitment_stage_id'		=> null
			,'created_by_user_id'		=> null
			,'assigned_to_user_id'		=> null
			,'account_client_id'		=> null
			,'rating'					=> null
			,'disqualified'				=> null
			,'disqualify_reason_id'		=> null
			,'created'					=> null
			,'modified'					=> null
		];
		return self::$_model::insert_model([$data_candidate_offers], new CandidateJobOffersModel)[0];

    }
    




}
