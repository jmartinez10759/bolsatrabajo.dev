<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;
use App\Model\BlmEstadosModel;

class ListadoController extends Controller
{

    /**
     *Metodo donde hace la consulta del listado de las vacantes
     *@access public
     *@param Request $request [ Description ]
     *@return void [ Description ]
     */
    public function index(Request $request)
    {
        #SE REALIZA LA CONSULTA PARA LAS VACANTES.
        $where = ['is_active' => 1, 'is_published' => null];
        $tasks = Listado::where( $where )->orderBy('id', 'DESC')->paginate(3);
        $response = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $where )->orderBy('id', 'DESC')->paginate(3)->toArray());
        #debuger($response);
        return [
            'pagination' => [
                'total'         => $tasks->total(),
                'current_page'  => $tasks->currentPage(),
                'per_page'      => $tasks->perPage(),
                'last_page'     => $tasks->lastPage(),
                'from'          => $tasks->firstItem(),
                'to'            => $tasks->lastItem(),
            ],
            'tasks' => $response
        ];

    }

    public function estados()
    {
        return $estados = BlmEstadosModel::all();

    }

	public function listado()
	{
        #realiza la consulta del listado de vacantes disponibles.
        $response=Listado::all();

        if ( count( $response ) > 0) {
			return message(true,$response,"Datos correctos");
		}else{
			return message(false,[],"Ocurrio un error");
		}
    }


}
