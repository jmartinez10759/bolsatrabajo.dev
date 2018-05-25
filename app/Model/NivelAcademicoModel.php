<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NivelAcademicoModel extends Model
{
    protected $table = "sde_niveles_academicos";
    public $fillable = [
    	'id'
		,'nombre'
    ];
    public function categorias(){
        return $this->hasMany('App\Model\CategoriasEducativasModel','id_nivel','id');
    }

}
