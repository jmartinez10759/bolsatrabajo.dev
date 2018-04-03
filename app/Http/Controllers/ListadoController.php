<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;

class ListadoController extends Controller
{

    public function index(Request $request)
    {
        $tasks = Listado::orderBy('id', 'DESC')->paginate(3);

        return [
            'pagination' => [
                'total'         => $tasks->total(),
                'current_page'  => $tasks->currentPage(),
                'per_page'      => $tasks->perPage(),
                'last_page'     => $tasks->lastPage(),
                'from'          => $tasks->firstItem(),
                'to'            => $tasks->lastItem(),
            ],
            'tasks' => $tasks
        ];
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
