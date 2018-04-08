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
    
    private static $_ruta = "details";

    public function __construct(){

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
    public static function authLogin( Request $request){

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

        #debuger(phpinfo());

        $condicion = [];
        if ( isset($where->email) && isset($where->password)) {
            $condicion['email'] = $where->email;
            $condicion['password'] = $where->password;
                
        }
        $consulta = MasterModel::show_model([], $condicion , new RequestUserModel );
        if( count( $consulta ) > 0 ){
            $session = [];
            foreach ($consulta[0] as $key => $value) {
                $session[$key] = $value;
            }
            #debuger($session);
            Session::put( $session );
            return redirect()->route( self::$_ruta );
        }
        return redirect()->route('/');


    }





}
