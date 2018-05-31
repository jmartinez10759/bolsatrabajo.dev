<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;
use App\Model\BlmCookieSerchModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;

class BusquedaController extends MasterController
{

    private $_where;

    public function __construct(){
        $this->_where = ['is_active' => 1, 'is_published' => 1];
    }

     public function scope( Request $request )
    {
        #debuger( $request->all() );
        $vacantes   = isset($request->vacantes)? $request->vacantes : false;
        $edo        = isset($request->edo)? $request->edo : false;
        $modulo     = isset($request->utilisateur)? $request->utilisateur : false;
        $values = ([ 'name'=> $vacantes ,'state_id' => $edo ]);

        if ( Session::get('id') && !$modulo ) {
            $cookie= BlmCookieSerchModel::create([
                'id_users'      => Session::get('id')
                ,'vacante'      => $vacantes
            ]);
        }

        if ( $values['state_id'] ) {
          $consulta =  Listado::with('accounts','contractType','workingtimetype','estados')
                                      ->where( $this->_where )
                                      ->where( 'name','LIKE',"%".$values['name']."%" )
                                      ->where('state_id','=',$values['state_id'] )
                                      ->orderBy('id', 'DESC')
                                      ->paginate(5);
              #debuger($consulta->data);
            // $consulta = Listado::where($where)->where( 'name','LIKE',"%".$values['name']."%" )
            //                 ->where('state_id','=',$values['state_id'] )
            //                 ->orderBy('id', 'DESC')
            //                 ->paginate(5);

            if ( count($consulta) == 0 ) {

              $consulta = Listado::with('accounts','contractType','workingtimetype','estados')
                                          ->where( $this->_where )
                                          #->where( 'name','LIKE',"%".$values['name']."%" )
                                          ->where('state_id','=',$values['state_id'] )
                                          ->orderBy('id', 'DESC')
                                          ->paginate(5);
                // $consulta = Listado::where($where)->where( 'name','LIKE',"%".$values['name']."%" )
                //             ->orwhere('state_id','=', $values['state_id'] )
                //             ->orderBy('id', 'DESC')
                //             ->paginate(5);
            }

        }else{
          /*$consulta = Listado::with('accounts','contractType','workingtimetype','estados')
                                      ->where( $where )
                                      ->where( 'name','LIKE',"%".$values['name']."%" )
                                      ->orderBy('id', 'DESC')
                                      ->paginate(5);*/
             $consulta =  Listado::where( $this->_where )->where( 'name','LIKE',"%".$values['name']."%" )
                            ->orderBy('id', 'DESC')
                            ->paginate(5);
        }

        $response = $consulta;
        $response->appends($request->only('vacantes'));
        #debuger(  $response[0] );
        return view("busqueda.busqueda", ["name" => $response, 'count' => count($response) ] );

    }

    public function index(Request $request)
    {
        return view('busqueda.form');
    }

  //   public function show($id)
	// {
  //     #$where = ['id' => $id,'is_active' => 1, 'is_published' => null ];
  //     $this->_where['id'] = $id;
	//     $response = Listado::where( $this->_where )->get();
	//     return view("busqueda.detalle", ["datos" => $response ]);
	// }
    public function autocomplete( Request $request )
    {
        #$where = ['is_active' => 1, 'is_published' => null ];
        $term = $request->input('query');
        $data = Listado::select('name')
                        ->where( $this->_where )
                        ->where( 'name', 'LIKE', "%".$term."%" )
                        ->groupBy('name')
                        ->get();
        return response()->json($data);
    }



}
