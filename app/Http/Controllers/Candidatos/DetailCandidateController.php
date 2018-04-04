<?php

namespace App\Http\Controllers\Candidatos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class DetailCandidateController extends MasterController
{
    
    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para obtener la vista de los detalles del candidato que se registro al portal.
     *@access public 
     *@return void
     */
    public static function index(){
    	
    	$data = [
    		'nombre_completo' =>  Session::get('name')." ".Session::get('first_surname')
    		,'photo_profile'  =>  ( Session::get('profile') != false )? Session::get('profile'): asset('images/profile/profile.png')
    		,'activo'		  =>  ( Session::get('status') != false )? "Activo": "Desactivado"
    		,'postulaciones'  =>  2
    	];

    	return view('candidato.detailCandidato',$data);

    }


}
