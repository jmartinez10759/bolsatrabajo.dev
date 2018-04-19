<?php

namespace App\Http\Controllers\Vacantes;

use App\Listado;
use App\Model\AccountsModel;
use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Model\DetailCandidateModel;
use Illuminate\Support\Facades\Session;
use App\Model\BlmPostulateCandidateModel;
use App\Http\Controllers\MasterController;

class DetailsJobsController extends MasterController
{
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para mandar a llamar la vista de los detalles del Candidato
     *@access public
     *@return void
     */
    public static function index(){

    	return view("busqueda.detalle");

    }
    /**
     *Metodo para realizar la consulta del id de la vacante para obtener el detalle
     *@access public
     *@param Request $request [Description]
     *@return void 
     */
    public static function show( Request $request ){

    	$where = ['id' => $request->id_vacante,'is_active' => 1];
    	$response = self::$_model::show_model([],$where, new Listado );
    	$data = [];
    	if ( sizeof( $response ) > 0 ) {
    		$empresa = self::$_model::show_model(['id','name','postal_code','website_url'],['id' => $response[0]->account_id], new AccountsModel )[0];
    		$data = [
    			'id' 					=> $response[0]->id
    			,'name' 				=> $response[0]->name
    			,'title' 				=> $response[0]->title
    			,'description_large' 	=> $response[0]->description_large
    			,'description_short' 	=> $response[0]->description_short
    			,'email' 				=> $response[0]->email
    			,'is_active' 			=> $response[0]->is_active
    			,'salary_max' 			=> $response[0]->salary_max
    			,'salary_min' 			=> $response[0]->salary_min
    			,'account_id' 			=> $empresa->id
    			,'account_name' 		=> $empresa->name
    			,'account_postal_code' 	=> $empresa->postal_code
    			,'account_website_url' 	=> $empresa->website_url
    		];

    		if ( Session::has('email') ) {
	    		$candidato =  self::$_model::show_model( ['confirmed_nss'], ['id' => Session::get('id')], new RequestUserModel)[0];
	    		$details  =  self::$_model::show_model( ['curp','nss'], ['id_users' => Session::get('id')], new DetailCandidateModel)[0];
	    	}
	    	$data['confirmed_nss'] = isset($candidato->confirmed_nss)?$candidato->confirmed_nss: null;
	    	$data['nss'] 		   = isset($details->nss)? $details->nss : null;
	    	$data['curp'] 		   = isset($details->curp)? $details->curp: null;

    		return message(true,$data,"Trasaccion Existosa");
    	}
    	return message(false,[],'Ocurrio un error al cargar la informacion');

    }
    /**
     *Metodo para insertar los datos de la postulacion en sus respectivas tablas
     *@access public
     *@param Request $request[ Description ]
     *@return void 
     */
    public static function store( Request $request ){

    	#se realiza la consulta a la tabla de postulaciones
    	$where = ['id_users' => Session::get('id'), 'id_vacante' => $request->id_vacante];
    	$postulaciones = self::$_model::show_model([],$where, new BlmPostulateCandidateModel);
    	if ($postulaciones) {
    		return message(false,[],"Ya te has postulado para esta vacante");
    	}
    	
    	$insert_postulacion = self::$_model::insert_model([$where], new BlmPostulateCandidateModel);

    	/*if ($insert_postulacion) {
    		
    	}*/
    	debuger($request->all());



    }


}
