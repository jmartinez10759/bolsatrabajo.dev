<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmStudyModel extends Model
{
    protected $table = "blm_study_candidate";
    public $fillable = [
    	'id'
        ,'id_cv'
        ,'id_nivel'
        ,'escuela'
        ,'fecha_inicio'
        ,'fecha_final'
    ];
    
}
