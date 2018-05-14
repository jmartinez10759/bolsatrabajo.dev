<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmSkillModel extends Model
{
    protected $table = "sde_skills_candidate";
    public $fillable = [
    	'id'
        ,'id_cv'
        ,'habilidad'
        ,'porcentaje'
        ,'skill_orden'
    ];
    
}
