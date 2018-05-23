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
    	#$where = ['id' => $request->id_vacante ];
    	#$response = self::$_model::show_model([],$where, new Listado );
      $where = ['id' => $request->id_vacante, 'is_active' => 1, 'is_published' => 1];
      $response = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $where )->get()->toArray());
      $accounts = ( isset( $response[0] ) && isset( $response[0]->accounts[0] ) )? $response[0]->accounts[0] : [];
      $contract_type = ( isset( $response[0] ) && isset( $response[0]->contract_type[0] ) )? $response[0]->contract_type[0] : [];
      $estados = ( isset( $response[0] ) && isset( $response[0]->estados[0] ) )? $response[0]->estados[0] : [];
      $workingtimetype = ( isset( $response[0] ) && isset( $response[0]->workingtimetype[0] ) )? $response[0]->workingtimetype[0] : [];
      $postulate = self::$_model::show_model([],['id_vacante' => $request->id_vacante,'id_users' => Session::get('id')], new BlmPostulateCandidateModel);
      #debuger($response);
    	$data = [];
    	if ( $response  ) {
    		#$empresa = self::$_model::show_model(['id','name','postal_code','website_url'],['id' => $response[0]->account_id], new AccountsModel );
    		$data = [
    			'id' 					           => $response[0]->id
    			,'name' 				         => $response[0]->name
    			,'title' 				         => $response[0]->title
    			,'other_details' 	       => $response[0]->other_details
    			,'description_short' 	   => $response[0]->description_short
    			,'email' 				         => $response[0]->email
    			,'is_active' 			       => $response[0]->is_active
    			,'salary_max' 			     => $response[0]->salary_max
    			,'salary_min' 			     => $response[0]->salary_min
    			,'salario' 			         => ($response[0]->salary_min && $response[0]->salary_max)? "$ ".$response[0]->salary_min."-".$response[0]->salary_max :"Salario no Mostrado"
    			,'state_id' 			       => $response[0]->state_id
    			,'account_id' 			     => $accounts->id
    			,'account_name' 		     => $accounts->name
    			,'account_postal_code' 	 => $accounts->postal_code
    			,'account_address' 	     => $accounts->street." ".$accounts->neighborhood." ".$accounts->municipality." ".$accounts->postal_code
    			,'estado' 	             => $estados->nombre
    			,'contract_type' 	       => $contract_type->name
    			,'workingtimetype'       => $workingtimetype->name

    		];

    		if ( Session::has('email') ) {
	    		   $candidato   =  self::$_model::show_model( ['confirmed_nss'], ['id' => Session::get('id')], new RequestUserModel);
	    		   $details     =  self::$_model::show_model( ['curp'], ['id_users' => Session::get('id')], new DetailCandidateModel);
	    		   $nss         =  self::$_model::show_model( ['nss'], ['id_users' => Session::get('id')], new BlmNssModel);
	    	}
    	    	$data['confirmed_nss'] = isset($candidato[0]->confirmed_nss)?$candidato[0]->confirmed_nss: null;
    	    	$data['nss'] 		       = isset($nss)? $nss :[];
            $data['curp']          = isset($details[0]->curp)? $details[0]->curp: null;
    	    	$data['is_postulate']  = ($postulate)? false: true;
	    	#debuger($data);
    		return message(true,$data,self::$message_success);
    	}
    	return message(false,[],self::$message_error);

    }



}
