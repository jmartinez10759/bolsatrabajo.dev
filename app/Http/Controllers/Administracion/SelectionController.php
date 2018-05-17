<?php

namespace App\Http\Controllers\Administracion;

use App\Model\MasterModel;
use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class SelectionController extends MasterController
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
 
        $fields = [ 'id_rol' => Session::get('id_rol'), 'id_users' => Session::get('id') ];
    	$data = [ 'menu' => self::menus( $fields ) ];
    	return View( 'administracion.selection',$data );
        
    }

}
