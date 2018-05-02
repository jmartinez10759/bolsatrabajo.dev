<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;
use App\Model\BlmCookieSerchModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BusquedaController extends Controller
{
     public function scope( Request $request )
    {
        #debuger( $request->all() );
        $vacantes   = isset($request->vacantes)? $request->vacantes : false;
        $edo        = isset($request->edo)? $request->edo : false;
        $modulo     = isset($request->utilisateur)? $request->utilisateur : false;

        if ($edo) {
            
            $consulta = Listado::where( 'name','LIKE',"%".$vacantes."%" )
                            ->where('state_id','=',$edo )              
                            ->orderBy('id', 'DESC')
                            ->paginate(5);

            if ( count($consulta) == 0 ) {
                
                $consulta = Listado::where( 'name','LIKE',"%".$vacantes."%" )
                            ->orwhere('state_id','=',$edo )              
                            ->orderBy('id', 'DESC')
                            ->paginate(5);   
            }

        }else{

             $consulta =  Listado::where( 'name','LIKE',"%".$vacantes."%" )
                            ->orderBy('id', 'DESC')
                            ->paginate(5);
        }

        $response = $consulta;
        ###### Busqueda #######
        if ( Session::get('id') && !$modulo ) {
            ###### Insercion de datos, Si hay session#####
            $cookie= BlmCookieSerchModel::create([
                'id_users'  => Session::get('id')
                ,'vacante'   => $vacantes
            ]);

        }

        return view("busqueda.busqueda", ["name" => $response, 'count' => count($response)] );

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
