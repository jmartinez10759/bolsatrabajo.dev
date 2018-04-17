<?php

namespace App\Http\Controllers\Curriculum;

use App\Model\BlmJobsModel;
use App\Model\BlmSkillModel;
use App\Model\BlmStudyModel;
use Illuminate\Http\Request;
use App\Model\CategoriaModel;
use App\Model\BlmEstadosModel;
use App\Model\RequestUserModel;
use App\Model\BlmCurriculumModel;
use App\Model\NivelAcademicoModel;
use App\Model\DetailCandidateModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class CurriculumController extends MasterController
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
  		
    	return view('candidato.curriculum');

    }
    /**
     *Metodo para obtener datos del candidato registrado al portal.
     *@access public 
     *@return void
     */
    public static function show(){

        #se realiza la consulta para obtener los datos del Candidato que subira el CV.
    	$where = ['id' => Session::get('id')];
    	$detalles 		= self::$_model::show_model([],['id_users' => Session::get('id')], new DetailCandidateModel);
    	$candidate  	= self::$_model::show_model([],$where, new RequestUserModel);
    	$categorias 	= self::$_model::show_model( [], [] , new CategoriaModel );
    	$nivel 			= self::$_model::show_model( [], [] , new NivelAcademicoModel );
    	$estados 			= self::$_model::show_model( [], [] , new BlmEstadosModel );
    	#debuger($detalles);
    	$where = ['id_users' => Session::get('id')];
    	$curriculum = self::$_model::show_model([],$where, new BlmCurriculumModel);
    	$data = [];
    	if ( count( $curriculum ) > 0) {
    		
    		for ($i=0; $i < count($curriculum); $i++) { 
    			
    			foreach ($curriculum[$i] as $key => $value) {
    				if ($key != "nombre" || $key != "puesto" || $key != "descripcion") {
    					$data[$key] = $value;	
    				}
    			}

    		}
    		$where = [ 'id_cv'	=>  $data['id'] ];
    		$study 			= self::$_model::show_model( [], $where , new BlmStudyModel );
	    	$jobs 			= self::$_model::show_model( [], $where , new BlmJobsModel );
	    	$skills 		= self::$_model::show_model( [], $where , new BlmSkillModel );

    		$data['status'] 		= 1;
            $data['id_nivel']       = 3;
            $data['id_cv']          = $data['id'];
            $data['study']          = self::_nivel_educativo( $study );
            $data['jobs']           = $jobs;
            $data['skills']         = $skills;

    	}else{

	        $data = [
	            'email2'		=> ""
	            ,'id_categoria'	=> 1
	            ,'status'		=> 0
	        ];

	        $data['study'] 		= [];
    		$data['jobs'] 		= [];
    		$data['skills'] 	= [];
    		$data['id_nivel'] 	= 3;
    		$data['id_cv'] 		= "";
    		
    	}
    	//Datos que deben de existir siempre.
        $data['nombre']         = $candidate[0]->name." ".$candidate[0]->first_surname." ".$candidate[0]->second_surname;
    	$data['email'] 		    = $candidate[0]->email;
		$data['puesto'] 		= $detalles[0]->cargo;
		$data['descripcion'] 	= $detalles[0]->descripcion;
		$data['telefono']		= $detalles[0]->telefono;
		$data['direccion']		= $detalles[0]->direccion;
		$data['id_state']		= $detalles[0]->id_state;
    	$data['categorias'] 	= $categorias;
    	$data['niveles'] 		= $nivel;
        #seccion de estudios
        $data['escuela']        = "";
        $data['fecha_inicio']   = date('Y-m-d');
        $data['fecha_final']    = date('Y-m-d');
        #seccion de trabajos
        $data['jobs_empresa']        = "";            
        $data['jobs_puesto']        = "";         
        $data['jobs_descripcion']    = "";            
        $data['jobs_fecha_inicio']   = date('Y-m-d');           
        $data['jobs_fecha_final']    = date('Y-m-d');            
        #seccion de habilidades
        $data['habilidad'] 			= "";
        $data['porcentaje'] 		= "";
        $data['estados'] 			= $estados;
    	#debuger($data);
        return message( true, $data ,"Transaccion exitosa" );

    }
    /**
     *Metodo para insertar los datos del CV y generar un id para poder insertarlo en las demas tablas
     *@access public
     *@param Request $request [description]
     *@return void
     */
    public static function store( Request $request ){

    	#debuger( $request->all() );
    	$where = ['id_users' => Session::get('id')];
    	$curriculum = self::$_model::show_model([],$where, new BlmCurriculumModel);
    	if ( count($curriculum) > 0 ) {
    		$register = [];
    		foreach ($request->all() as $key => $value) {
    			if ($value != null) {
    				$register[$key] = $value;
    			}
    		}
    		#debuger($register);
    		$where = ['id' => $curriculum[0]->id ];
    		$response = self::$_model::update_model( $where, $register, new BlmCurriculumModel );
    		if (count($response) > 0) {
	    		return message(true,$response,"Transaccion exitosa");
	    	}else{
	    		return message(false,[],"Ocurrio un Error");
	    	}


    	}else{
    		
    		$data = [];
	    	foreach ($request->all() as $key => $value) {
	    		$data[$key] = $value;
	    	}
	    	$data['fecha_nacimiento'] = date('Y-m-d');
	    	$data['url_cv'] 	= "ruta";
	    	$data['id_users'] 	= Session::get('id');
	    	#debuger($data);
	    	$response = self::$_model::insert_model([$data], new BlmCurriculumModel);
	    	if (count($response) > 0) {
	    		return message(true,$response,"Transaccion exitosa");
	    	}else{
	    		return message(false,[],"Ocurrio un Error");
	    	}

    	}

    }
    /**
     *Metodo para niveles academicos
     *@access private
     *@param $data array [description]
     *@return void
     */
   	private static function _nivel_educativo( $data = array() ){

   		$nivel = [];
   		if (count( $data ) > 0 ) {
   			for ($i=0; $i < sizeof( $data ); $i++) { 
	   			
	   			foreach ($data[$i] as $key => $value) {
	   				if ($key == "id_nivel") {
	   					$nivel[$i]['nivel'] = self::$_model::show_model([],['id' => $value], new NivelAcademicoModel )[0]->nombre;	
	   				}
	   				$nivel[$i][$key] = $value; 
	   			}
   				
   			}

   			return $nivel;
   		}

   		return $nivel;


   	}



}
