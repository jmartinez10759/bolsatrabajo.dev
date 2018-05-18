<?php

namespace App\Http\Controllers\Administracion;

use App\Listado;
use Illuminate\Http\Request;
use App\Model\RequestUserModel;
#use App\Model\DetailCandidateModel;
use App\Model\JobsOffersModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class DashboardController extends MasterController
{

    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para obtener la vista de Candidatos y/o portal de admin
     *@access public
     *@return void
     */
    public static function index(){

    	$candidatos = array_to_object(RequestUserModel::with('description')->where(['id_rol' => 2])->get()->toArray());
    	$data = [ 
    		'menu' 			=> self::menus( [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ] )
    		,'candidatos' 	=> count($candidatos)
    		#,'detalles'		=> $candidatos
    	];
    	return View( 'administracion.dashboard', $data );
        
	}
	/**
	 * Metodo para la consulta de los datos de trabajos
	 * @access public
	 * @return json
	 */
	public static function show(){
		
		$trabajos =  JobsOffersModel::orderBy('id', 'DESC')->paginate(5);		
		$detalles =  RequestUserModel::where( ['id_rol' => 2 ] )->orderBy('id', 'DESC')->paginate(4);
		$fields['trabajos'] = data_march($trabajos);
		$fields['detalles'] = data_march($detalles);
		$fields['pagination']       =  [
			'total'         => $trabajos->total()
			,'current_page'  => $trabajos->currentPage()
			,'per_page'      => $trabajos->perPage()
			,'last_page'     => $trabajos->lastPage()
			,'from'          => $trabajos->firstItem()
			,'to'            => $trabajos->lastItem()
        ];
    	return message( true,$fields,self::$message_success );

	}
	

}
