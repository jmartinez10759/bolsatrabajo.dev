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
        $vacantes = $request->input('vacantes');
        $edo = $request->input('edo');
        $id_user = 5;

       /* $result = DB::select('SELECT * FROM users where name like :vacantes or curp like :curp',['vacantes' 	 => $vacantes,'curp' =>$edo] );
        debuger($result);*/
        if ($id_user == '') {
            ###### Busqueda #######
            $response = Listado::where( 'name','LIKE',"%".$vacantes."%" )
                                ->orwhere('state_id','=','$edo')              
                                ->orderBy('id', 'DESC')->paginate(5);
            ###### count resutados ######
            $count = DB::select('SELECT count(*) con FROM job_offers where name like :vacantes or state_id =:curp',['vacantes'      => $vacantes,'curp' =>$edo] );

        }else{
            ###### Busqueda ######
            $response = Listado::where( 'name','LIKE',"%".$vacantes."%" )
                                 ->orwhere('state_id','=','$edo')        
                                 ->orderBy('id', 'DESC')->paginate(5);
            ###### count resutados ######
            $count = DB::select('SELECT count(*) con FROM job_offers where name like :vacantes or state_id =:curp',['vacantes'      => $vacantes,'curp' =>$edo] );

            ###### Insercion de datos, Si hay session#####
            $cookie= BlmCookieSerchModel::create([
            'id_users' => $id_user,
            'vacante' => $vacantes,
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
    /**
     *Metodo para obtener los detalles de la vacante seleccionada por el candidato
     *@access public
     *@param Request $request [Description]
     *@return void
     */
    /*public function get_vacante( Request $request ){

        $where = ['id' => $request->id_vacante ];
        $response = Listado::where( $where )->get();
        return message(true,$response,"Transaccion exitosa");

    }*/



}
