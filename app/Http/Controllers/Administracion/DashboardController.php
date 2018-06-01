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
    		'candidatos' 	    => count($candidatos)
    		,'page_title' 	  => "Dashboard"
    		,'title' 	        => "Dashboard"
    		,'subtitle' 	    => ""
    	];
      return self::_load_view( 'administracion.dashboard', $data );

	}
	/**
	 * Metodo para la consulta de los datos de trabajos
	 * @access public
	 * @return json
	 */
	public static function show(){

    $where = ['is_active' => 1, 'is_published' => 1];
		$trabajos =  JobsOffersModel::where( $where )->orderBy('id', 'DESC')->paginate(5);
    #$trabajos = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $where )->orderBy('id', 'DESC')->paginate(5)->toArray() );
    #debuger($trabajos);
		#$detalles =  RequestUserModel::where( ['id_rol' => 2 ] )->orderBy('id', 'DESC')->paginate(4);
		$detalles = RequestUserModel::with('description')->where(['id_rol' => 2])->paginate(4);
    #debuger( $detalles->data );
		$fields['trabajos'] = data_march($trabajos);
		$fields['detalles'] = data_march($detalles);
		$fields['pagination']       =  [
      			'total'          => $trabajos->total()
      			,'current_page'  => $trabajos->currentPage()
      			,'per_page'      => $trabajos->perPage()
      			,'last_page'     => $trabajos->lastPage()
      			,'from'          => $trabajos->firstItem()
      			,'to'            => $trabajos->lastItem()
      ];
      $fields['pagination_detalles']       =  [
        			'total'          => $detalles->total()
        			,'current_page'  => $detalles->currentPage()
        			,'per_page'      => $detalles->perPage()
        			,'last_page'     => $detalles->lastPage()
        			,'from'          => $detalles->firstItem()
        			,'to'            => $detalles->lastItem()
        ];
      #debuger($fields);
    	return message( true,$fields,self::$message_success );

	}


}
