<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmJobsModel extends Model
{
    protected $table = "blm_jobs_candidate";
    public $fillable = [
    	'id'
        ,'id_cv'
        ,'empresa'
        ,'puesto'
        ,'descripcion'
        ,'fecha_inicio'
        ,'fecha_final'
    ];
}
