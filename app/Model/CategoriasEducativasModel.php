<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriasEducativasModel extends Model
{
  protected $table = "sde_categorias_educativas";
  public $fillable = [
    'id'
    ,'id_nivel'
    ,'nombre'
  ];


}
