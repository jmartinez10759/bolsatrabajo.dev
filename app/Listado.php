<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
  	  protected $table    =  'users';
      #protected $guarded  = ['id' , 'created_at' , 'updated_at'];
      protected $fillable = [

        'id',
        'name',
        'email',
        'password',

    	];
}
