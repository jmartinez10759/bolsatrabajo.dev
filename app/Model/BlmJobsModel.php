<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmJobsModel extends Model
{
    protected $table = "sde_jobs_candidate";
    public $fillable = [
    	'id'
        ,'id_cv'
        ,'jobs_empresa'
        ,'jobs_puesto'
        ,'jobs_descripcion'
        ,'jobs_orden'
        ,'jobs_fecha_inicio'
        ,'jobs_fecha_final'
    ];
}
