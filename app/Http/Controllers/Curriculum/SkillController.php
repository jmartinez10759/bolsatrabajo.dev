<?php

namespace App\Http\Controllers\Curriculum;

use Illuminate\Http\Request;
use App\Model\BlmSkillModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class SkillController extends MasterController
{

    public function __construct(){
    	parent::__construct();
    }
    /**
     *Metodo para insertar los datos de estudios.
     *@access public
     *@param Request $request [description]
     *@return void
     */
    public static function store( Request $request ){

    	debuger( $request->all() );

    }
}
