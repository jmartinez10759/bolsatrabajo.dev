<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NivelAcademicoModel extends Model
{
    protected $table = "blm_niveles_academicos";
    public $fillable = [
    	'id'
		,'nombre'
    ];

}