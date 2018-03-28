<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;

class ListadoController extends Controller
{

    public function index()
    {
        return view('index');
    }

	public function listado()

	{
        $listado=Listado::orderBy('id','DESC')->paginate(3);
        return view('listado.layout',compact('listado')); 
    }


}
