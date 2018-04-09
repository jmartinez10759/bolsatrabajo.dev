<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BusquedaController extends Controller
{
     public function scope( Request $request )
    {
    	#debuger($request->all());
        $vacantes = $request->input('vacantes');
        $edo = $request->input('edo');
       /* $result = DB::select('SELECT * FROM users where name like :vacantes or curp like :curp',['vacantes' 	 => $vacantes,'curp' =>$edo] );
        debuger($result);*/

        $response = Listado::where( 'departament','LIKE',"%".$vacantes."%" )->orwhere('state_id','LIKE',"%". $edo."%")								 ->orderBy('id', 'DESC')->paginate(3);

        return view("busqueda.busqueda", ["name" => $response ]);
    }

    public function index(Request $request)
    {        
        return view('busqueda.form');
    }

    public function show($id)
	{
	    $response = Listado::where( 'id',$id)->get();
	    return view("busqueda.detalle", ["datos" => $response ]);
	}

}
