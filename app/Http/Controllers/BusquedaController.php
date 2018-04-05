<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
     public function scope( Request $request )
    {
    	#debuger($request->all());
        $vacantes = $request->input('vacantes');
        $edo = $request->input('edo');
       /* $result = DB::select('SELECT * FROM users where name like :vacantes or curp like :curp',['vacantes' 	 => $vacantes,'curp' =>$edo] );
        debuger($result);*/

        $response = Listado::where( 'name','LIKE',"%".$vacantes."%" )->orwhere('curp','LIKE',"%". $edo."%")
        					->get();

        return view("busqueda.form", ["name" => $response ]);
    }

}
