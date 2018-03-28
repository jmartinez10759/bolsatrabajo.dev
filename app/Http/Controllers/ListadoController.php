<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listado;

class ListadoController extends Controller
{

    public function index()
    {
    	$listado=Listado::orderBy('id','DESC')->paginate(10);
        return view('index',compact('listado'));
    }

	public function listado()

	{
        
        return view('listado.layout',compact('listado')); 
    }


}
