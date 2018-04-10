<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;

class ListadoController extends Controller
{

    public function index()
    {
    	
        #return view('index');
        return view('listados.listado_busqueda');
    }

	public function listado()
	{
       
        $response=Listado::all();
        
        if ( count( $response ) > 0) {
			return message(true,$response,"Datos correctos");
		}else{
			return message(false,[],"Ocurrio un error");
		}
    }


}
