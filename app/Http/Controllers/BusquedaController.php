<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;
use App\Model\BlmCookieSerchModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BusquedaController extends Controller
{
     public function scope( Request $request )
    {
        debuger($request->all());

        $vacantes   = isset($request->vacantes)? $request->vacantes : false;
        $edo        = isset($request->edo)? $request->edo : false;
        $id_user    = isset($request->utilisateur)? $request->utilisateur : false;
        ###### Busqueda #######
        $response = Listado::where( 'name','LIKE',"%".$vacantes."%" )
                            ->orwhere('state_id','=','$edo')              
                            ->orderBy('id', 'DESC')->paginate(5);
        ###### count resutados ######
        $count = DB::select('SELECT count(*) con FROM job_offers where name like :vacantes or state_id =:curp',['vacantes'      => $vacantes,'curp' =>$edo] );

        if ( !Session::get('id') ) {
            ###### Insercion de datos, Si hay session#####
            $cookie= BlmCookieSerchModel::create([
                'id_users'  => Session::get('id'),
                'vacante'   => $vacantes,
            ]);

        }
        #debuger($response);
         return view("busqueda.busqueda", ["name" => $response, "count" => $count]);
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
    public function autocomplete(Request $request)
    {
        $term = $request->input('query');
        $data = Listado::select('name')
                        ->where( 'name', 'LIKE', "%".$term."%" )
                        ->groupBy('name')
                        ->get();
        return response()->json($data);
    }



}
