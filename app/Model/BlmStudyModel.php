<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmStudyModel extends Model
{
    protected $table = "sde_study_candidate";
    public $fillable = [
    	'id'
        ,'id_cv'
        ,'id_nivel'
        ,'id_categorias_educativas'
        ,'id_estatus_academico'
        ,'escuela'
        ,'otra_categoria'
        ,'cedula'
        ,'fecha_inicio'
        ,'fecha_final'
    ];

}
