<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlmCurriculumModel extends Model
{
    
	protected $table = "blm_curriculum";
    public $fillable = [
    	'id'
		,'id_users'
		,'id_state'
		,'id_categoria'
		,'email'
		,'email2'
		,'nombre'
		,'puesto'
		,'descripcion'
		,'telefono'
		,'direccion'
		,'fecha_nacimiento'
		,'url_cv'
    ];
             
            
}
