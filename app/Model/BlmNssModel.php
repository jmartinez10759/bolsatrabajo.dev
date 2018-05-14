<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmNssModel extends Model
{
    protected $table = "sde_nss";
    public $fillable = [
    	'id'
        ,'id_users'
        ,'nss'
    ];
}
