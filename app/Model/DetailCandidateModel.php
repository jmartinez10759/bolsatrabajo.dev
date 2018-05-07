<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailCandidateModel extends Model
{
    protected $table = "blm_details_candidate";
    public $fillable = [
		'id'
		,'id_users'
		,'id_state'
		,'telefono'
		,'codigo'
		,'direccion'
		,'curp'
		,'cargo'
		,'descripcion'
		,'photo'
    ];
}
