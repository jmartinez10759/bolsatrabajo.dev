<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmNssModel extends Model
{
    protected $table = "blm_nss";
    public $fillable = [
    	'id'
        ,'id_users'
        ,'nss'
    ];
}
