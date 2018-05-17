<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Model\DetailCandidateModel;
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

    	$candidatos = array_to_object(RequestUserModel::with('description')->get()->toArray()); 
    	#debuger($candidatos);
    	$data = [ 
    		'menu' 			=> self::menus( [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ] )
    		,'candidatos' 	=> count($candidatos)
    		,'detalles'		=> $candidatos
    	];
    	return View( 'administracion.dashboard', $data );
        
    }

}
