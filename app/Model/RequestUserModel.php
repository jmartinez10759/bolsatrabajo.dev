<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestUserModel extends Model
{
    protected $table = "request_users";
    public $fillable = [
    	'id'
    	,'name'
		,'first_surname'
		,'second_surname'
		,'full_name'
		,'nombre_completo'
		,'numero_credito_infonavit'
		,'email'
		,'curp'
		,'nss'
		,'password'
		,'remember_token'
		,'api_token'
		#,'created_at'
		#,'updated_at'
    ];
}
