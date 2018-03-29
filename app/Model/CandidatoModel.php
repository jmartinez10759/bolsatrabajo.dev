<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CandidatoModel extends Model
{
    protected $table = "users";
    public $fillable = [
    	'id'
    	,'name'
    	,'email'
    	,'password'
    	,'curp'
    	,'nss'
    	,'remember_token'
    	,'api_token'
    ];
}
