<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
	
    /**
     *Metodo para la creacion y formacion del menu conforme al usuario y su rol
     *@access public 
     *@param integer $id_usuario [description]
     *@return void
     */
    public static function menus( $id_users ){
        echo $id_users;
        return '<h1>yo merengues diablo que hijo de tu.....'.$id_users.'</h1>';

    }

}
