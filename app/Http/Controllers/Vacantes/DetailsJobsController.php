<?php

namespace App\Http\Controllers\Vacantes;

use App\Listado;
use App\Model\AccountsModel;
use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Model\DetailCandidateModel;
use App\Model\BlmNssModel;
use App\Model\PersonModel; #tabla de buro
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
    		$empresa = self::$_model::show_model(['id','name','postal_code','website_url'],['id' => $response[0]->account_id], new AccountsModel );
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
    			,'state_id' 			=> $response[0]->state_id
    			,'account_id' 			=> $empresa[0]->id
    			,'account_name' 		=> $empresa[0]->name
    			,'account_postal_code' 	=> $empresa[0]->postal_code
    			,'account_website_url' 	=> $empresa[0]->website_url
    		];

    		if ( Session::has('email') ) {
	    		$candidato =  self::$_model::show_model( ['confirmed_nss'], ['id' => Session::get('id')], new RequestUserModel);
	    		$details  =  self::$_model::show_model( ['curp'], ['id_users' => Session::get('id')], new DetailCandidateModel);
	    		$nss  =  self::$_model::show_model( ['nss'], ['id_users' => Session::get('id')], new BlmNssModel);
	    	}
	    	$data['confirmed_nss'] = isset($candidato[0]->confirmed_nss)?$candidato[0]->confirmed_nss: null;
	    	$data['nss'] 		   = isset($nss)? $nss :[];
	    	$data['curp'] 		   = isset($details[0]->curp)? $details[0]->curp: null;
	    	#debuger($data);
    		return message(true,$data,"Trasaccion Existosa");
    	}
    	return message(false,[],'Ocurrio un error al cargar la informacion');

    }
    


}
