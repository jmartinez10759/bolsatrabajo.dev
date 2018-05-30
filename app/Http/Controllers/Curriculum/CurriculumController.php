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
use Illuminate\Support\Facades\DB;
use App\Model\DetailCandidateModel;
use App\Model\SdeEstatusAcademicoModel;
use Illuminate\Support\Facades\Session;
use App\Model\CategoriasEducativasModel;
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
    	$nivel 			  = self::$_model::show_model( [], [] , new NivelAcademicoModel );
    	$estados 			= self::$_model::show_model( [], [] , new BlmEstadosModel );

      $doctorado    = self::$_model::show_model( [], ['id_nivel' => 1] , new CategoriasEducativasModel );
      $maestria     = self::$_model::show_model( [], ['id_nivel' => 2] , new CategoriasEducativasModel );
      $licenciatura = self::$_model::show_model( [], ['id_nivel' => 3] , new CategoriasEducativasModel );
      $bachillerato = self::$_model::show_model( [], ['id_nivel' => 4] , new CategoriasEducativasModel );

      $estatus_academico = self::$_model::show_model( [], [] , new SdeEstatusAcademicoModel );
    	#debuger($licenciatura);
    	$where = ['id_users' => Session::get('id')];
    	$curriculum = self::$_model::show_model([],$where, new BlmCurriculumModel);
    	$data = [];
    	if ( $curriculum ) {

    		$fields = ['nombre','puesto','descripcion'];
    		for ($i=0; $i < count($curriculum); $i++) {

    			foreach ($curriculum[$i] as $key => $value) {

    				if (!in_array($key, $fields)) {
    					$data[$key] = $value;
    				}
    			}

    		}

    		$where = [ 'id_cv'	=>  $data['id'] ];
    		$study 			= self::$_model::show_model( [], $where , new BlmStudyModel,[ 'id_nivel' => 'ASC'] );
	    	$jobs 			= self::$_model::show_model( [], $where , new BlmJobsModel,[ 'jobs_orden' => 'ASC'] );
	    	$skills 		= self::$_model::show_model( [], $where , new BlmSkillModel,[ 'skill_orden' => 'ASC'] );

    		    $data['status'] 		    = 1;
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
    	#Datos que deben de existir siempre.
        $data['nombre']         = $candidate[0]->name." ".$candidate[0]->first_surname." ".$candidate[0]->second_surname;
        $data['email'] 		      = $candidate[0]->email;
        $data['puesto'] 		    = $detalles[0]->cargo;
        $data['descripcion'] 	  = $detalles[0]->descripcion;
        $data['telefono']		    = $detalles[0]->telefono;
        $data['direccion']		  = $detalles[0]->direccion;
        $data['id_state']		    = $detalles[0]->id_state;
        $data['categorias'] 	  = $categorias;
        $data['niveles'] 		    = $nivel;
        #seccion de estudios
        $data['escuela']        = "";
        $data['fecha_inicio']   = date('Y-m-d');
        $data['fecha_final']    = date('Y-m-d');
        #seccion de trabajos
        $data['jobs_empresa']        = "";
        $data['jobs_puesto']         = "";
        $data['jobs_descripcion']    = "";
        $data['jobs_orden']    		 = "";
        $data['jobs_fecha_inicio']   = date('Y-m-d');
        $data['jobs_fecha_final']    = date('Y-m-d');
        $data['jobs_jefe_inmediato'] = "";
        $data['jobs_telefono']       = "";
        $data['jobs_sucursal']       = "";
        #seccion de habilidades
        $data['habilidad'] 			= "";
        $data['porcentaje'] 		= "";
        $data['skill_orden'] 		= "";

        $data['estados'] 			      = $estados;
        #categorias academicas
        $data['doctorado'] 			    = $doctorado;
        $data['maestria'] 			    = $maestria;
        $data['licenciatura'] 			= $licenciatura;
        $data['bachillerato'] 			= $bachillerato;
        #estatus academicos
        $data['estatus_academico'] = $estatus_academico;
    	  #debuger($data);
        return message( true, $data ,self::$message_success );

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
        $values_details_curriculm = ['nombre','puesto','direccion'];
    		foreach ($request->all() as $key => $value) {
          #debuger($key);
              if ($value != null) {
                $register[$key] = $value;
              }
              if ( in_array( $key ,$values_details_curriculm ) ) {
                $register[$key] = strtoupper($value);
              }

    		}
        #debuger($register);
    		$where = ['id' => $curriculum[0]->id ];
    		$response = self::$_model::update_model( $where, $register, new BlmCurriculumModel );
        #actualizo la tabla de detalles
        $data_details = [
          'id_state'      => isset($register['id_state'])? $register['id_state']: null
          ,'direccion'    => isset($register['direccion'])? $register['direccion']: null
          ,'cargo'        => isset($register['puesto'])? $register['puesto']: null
          ,'descripcion'  => isset($register['descripcion'])? $register['descripcion']: null
          ,'telefono'     => isset($register['telefono'])? $register['telefono']: null
        ];
    		$response_details = self::$_model::update_model( ['id_users' => $curriculum[0]->id_users ], $data_details, new DetailCandidateModel );
        #debuger($response_details);
    		if ( count($response) > 0 ) {
            $nombre_completo = parse_name($response[0]->nombre);
            #debuger($nombre_completo);
            $data = [
              'name'              => $nombre_completo['nombre']
              ,'first_surname'    => $nombre_completo['first_surname']
              ,'second_surname'   => $nombre_completo['second_surname']
            ];
             $update_users = self::$_model::update_model($where,$data, new RequestUserModel);
	    		   return message(true,$update_users,self::$message_success);
	    	}else{
	    		   return message(false,[],self::$message_error);
	    	}


    	}else{

    		$data = [];
        $claves_data =  ['id_state','id_categoria','email','email2','nombre','puesto','descripcion','telefono','direccion'];
        $claves_upper = ['nombre','puesto','descripcion','telefono','direccion'];
	    	foreach ( $request->all() as $key => $value ) {
          if( in_array($key,$claves_data) ){
              $data[$key] = $value;
          }
          if( in_array($key,$claves_upper ) ){
            $data[$key] = strtoupper($value);
          }
	    	}
	    	$data['fecha_nacimiento']  = date('Y-m-d');
	    	$data['url_cv'] 	         = "ruta";
	    	$data['id_users'] 	       = Session::get('id');
	    	#debuger($data);
        #se realiza las inserccion y actualziacion de las tablas con Transaccion
        #debuger($response_curp);
        $error = null;
        DB::beginTransaction();
        try {

          $where = [ 'id_users' => $data['id_users'] ];
          $nombre_completo = parse_name( $data['nombre'] );
          $data_details = [
            'id_state'      => isset($data['id_state'])? $data['id_state']: null
            ,'direccion'    => isset($data['direccion'])? $data['direccion']: null
            ,'cargo'        => isset($data['puesto'])? $data['puesto']: null
            ,'descripcion'  => isset($data['descripcion'])? $data['descripcion']: null
            ,'telefono'     => isset($data['telefono'])? $data['telefono']: null
          ];
          $data_users = [
            'name'              => $nombre_completo['nombre']
            ,'first_surname'    => $nombre_completo['first_surname']
            ,'second_surname'   => $nombre_completo['second_surname']
          ];
          #se realizan los querys.
          $insert_curriculum  = self::$_model::create_model([$data], new BlmCurriculumModel);
          $update_details     = self::$_model::update_model( $where ,$data_details ,new DetailCandidateModel);
          $update_users       = self::$_model::update_model([ 'id' => $data['id_users'] ],$data_users, new RequestUserModel );

          DB::commit();
          $success = true;
        } catch (\Exception $e) {
            $success = false;
            $error = $e->getMessage();
            DB::rollback();
        }

        if ($success) {
          return message(true,$insert_curriculum,"¡Registros correctos!");
        }
        return message( false, $error ,'¡Ocurrio un error , favor de verificar!');

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
