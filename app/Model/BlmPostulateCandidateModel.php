<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmPostulateCandidateModel extends Model
{
    protected $table = "sde_postulate_candidate";
    public $fillable = [
    	'id'
    	,'id_users'
        ,'id_vacante'
    ];
}
