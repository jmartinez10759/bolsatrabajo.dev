<?php

namespace App\Http\Controllers\Auth;

use App\Model\MasterModel;
use Illuminate\Http\Request;
use App\Model\RequestUserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class AuthController extends MasterController
{
    
    private static $_ruta   = "details";

    public function __construct(){
        parent::__construct();
    }
    /**
     *Metodo para visuzalizar para iniciar session
     *@access public
     *@return void
     */
    public static function showLogin(){
    	
    	return View('auth.auth');

    }
    /**
     *Metodo para visuzalizar para iniciar session
     *@access public
     *@return void
     */
    public static function authLogin( Request $request ){

    	$where = [];
		foreach ($request->all() as $key => $value) {
			if ($key != "_token") {
				$where[$key] = $value;
			}
			if ( $key == "password" ) {
				$where[$key] = sha1($value);
			}
		}
		#se realiza la consulta para verificar si existen ese candidato en la base de datos
        return self::getData( array_to_object($where) );

    }
    /**
     *Metodo para cerrar session
     *@access public
     *@return void
     */
    public static function logout(){
        #debuger($_SERVER);
    	Session::flush();
    	return redirect()->route('/');

    }
    /**
     *Metodo para realizar la consulta de la session.
     *@access public
     *@param $where array [description]
     *@return void
     */
    public static function getData( $where ){

        $condicion = [];
        if ( isset($where->email) && isset($where->password)) {
            $condicion['email'] = $where->email;
            $condicion['password'] = $where->password;
            $condicion['confirmed'] = true;    
        }
        $url            = self::$_domain."api/bolsa/token";
        $headers        = [ 'Content-Type'  => 'application/json'];
        $data['data']   = [ 'email'=> $where->email ];
        $method         = 'put';
        $response       = self::endpoint( $url,$headers,$data,$method);
        
        if ($response->success == true) {
            $condicion['api_token'] = $response->result[0]->api_token;    
        }else{
            $condicion['api_token'] = null;    
        }

        $consulta = MasterModel::show_model([], $condicion , new RequestUserModel );
        if( $consulta ){
            $session = [];
            foreach ($consulta[0] as $key => $value) {
                $session[$key] = $value;
            }
            Session::put( $session );
            return message( true, $consulta[0],'Usuario inicio sesion correctamente.');
        }

        return message(false,[],'Por favor Verificar la informacion ingresada');


    }
    /**
     *Metodo donde verifica el token generado para validar y redireccionar
     *@access public
     *@param $confirmed_code [description]
     *@return void
     */
    public static function verify_code( $confirmed_code ){

        if ( $confirmed_code ) {
            
                $condicion = ['confirmed_code' => $confirmed_code ];
                $consulta = MasterModel::show_model([], $condicion , new RequestUserModel );
                if( $consulta ){

                    $session = [];
                    $datos = [ 'confirmed_code' => null, 'confirmed' => true, 'api_token' => str_random(50) ];
                    $where = ['email' => $consulta[0]->email];
                    $response = MasterModel::update_model( $where,$datos, new RequestUserModel );
                    #debuger($response[0]);
                    foreach ($response[0] as $key => $value) {
                        $session[$key] = $value;
                    }
                    Session::put( $session );
                    return redirect()->route( self::$_ruta );

                }
                
                return redirect()->route('/');

        }
        return redirect()->route('/');

    }



}
