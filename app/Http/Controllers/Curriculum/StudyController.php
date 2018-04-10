<?php

namespace App\Http\Controllers\Curriculum;

use Illuminate\Http\Request;
use App\Model\BlmStudyModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class StudyController extends MasterController
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
        
        $data = [];
        foreach ($request->all() as $key => $value) {
            if ( $value != null ) {
                $data[$key] = $value;        
            }
        }
        $response = self::$_model::insert_model([$data], new BlmStudyModel);
        
        if (count($response) > 0) {
            return message(true,$response[0],"Transaccion Exitosa");
        }else{
            return message(false,[],"Ocurrio Un Error");
        }

    }
    


}
