<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CandidatoModel extends Model
{
    protected $table = "cat_candidatos";
    public $fillable = [
    	'id_candidatos'
    	,'name', 
    	,'email', 
    	,'password'
    ];
}
