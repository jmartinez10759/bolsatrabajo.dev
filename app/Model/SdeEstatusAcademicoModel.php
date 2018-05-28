<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SdeEstatusAcademicoModel extends Model
{

  protected $table = "sde_estatus_academico";
  public $fillable = [
    'id'
    ,'nombre'
    ,'estatus'
  ];

    
}
