<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;
use App\Model\BlmEstadosModel;

class ListadoController extends Controller
{


    private $_where;

    public function __construct(){
        $this->_where = ['is_active' => 1, 'is_published' => 1];
    }
    /**
     *Metodo que carga la vista principal de la busqueda y el listado.
     *@access public
     *@return void
     */
    public function main(){

      $this->_where['highlight'] = 1;
      $destacadas = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $this->_where )->orderBy('id', 'DESC')->get()->toArray());
      $data['destacadas'] = $destacadas;
      return view('listados.listado_busqueda',$data);
    }
    /**
     *Metodo donde hace la consulta del listado de las vacantes mediante las empresas.
     *@access public
     *@param Request $request [ Description ]
     *@return void [ Description ]
     */
    public function index( Request $request )
    {
        #SE REALIZA LA CONSULTA PARA LAS VACANTES.
        $tasks = Listado::where( $this->_where )->orderBy('id', 'DESC')->paginate(3);
        $response = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $this->_where )->orderBy('id', 'DESC')->paginate(3)->toArray());
        $this->_where['highlight'] = 1;
        $destacadas = array_to_object(Listado::with('accounts','contractType','workingtimetype','estados')->where( $this->_where )->orderBy('id', 'DESC')->get()->toArray());
        #debuger( $destacadas );
        $data['pagination'] =  [
            'total'         => $tasks->total(),
            'current_page'  => $tasks->currentPage(),
            'per_page'      => $tasks->perPage(),
            'last_page'     => $tasks->lastPage(),
            'from'          => $tasks->firstItem(),
            'to'            => $tasks->lastItem(),
        ];
        $data['vacantes'] = $response->data;
        $data['destacadas'] = $destacadas;
        #debuger($data['vacantes']);
        return $data;


    }

    public function estados()
    {
        return $estados = BlmEstadosModel::all();

    }

	public function listado()
	{
        #realiza la consulta del listado de vacantes disponibles.
        $response=Listado::all();
        #debuger( $response );
        if ( count( $response ) > 0) {
    			return message( true, $response ,"Datos correctos");
    		}else{
    			return message( false, [] ,"Ocurrio un error");
    		}
    }


}
