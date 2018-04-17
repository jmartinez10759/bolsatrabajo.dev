<?php

namespace App\Http\Controllers\Vacantes;

use App\Listado;
use App\Model\AccountsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    		$data = [
    			'id' => $response[0]->id
    			,'name' => $response[0]->name
    			,'title' => $response[0]->title
    			,'description_large' => $response[0]->description_large
    			,'description_short' => $response[0]->description_short
    			,'email' => $response[0]->email
    			,'is_active' => $response[0]->is_active
    			,'salary_max' => $response[0]->salary_max
    			,'salary_min' => $response[0]->salary_min
    			,'account_id' => self::$_model::show_model(['name','postal_code','website_url'],['id' => $response[0]->account_id], new AccountsModel )[0];
    		];

    		debuger($data);

    		return message(true,$response[0],"Trasaccion Existosa");
    	}
    	return message(false,[],'Ocurrio un error al cargar la informacion');



    }

}
