<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listado;

class BusquedaController extends Controller
{
     public function scope(Request $request)
    {
        if($request->isMethod("post") && $request->has("vacantes"))
        {
            $name = $request->input("vacantes");
            $re = Listado::where('name', 'LIKE', '%' . $name . '%');
        }
        else
        {
            $name = "";
        }
        return view("busqueda.form", ["name" => $re ]);
    }

}
