<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
    protected $table = "persons";
    public $fillable = [
    	'id'
		,'name'
		,'first_surname'
		,'second_surname'
		,'curp'
		,'full_name'
		,'nombre_completo'
		,'is_wrong_curp'
		,'is_wrong_name'
		,'is_wrong_first_name'
		,'is_wrong_second_name'
		,'mcode2'
		,'numero_credito_infonavit'
		,'terms_accepted'
		,'terms_accepted_date'
		,'state_id'
		,'has_arco'
		,'arco_created'
		,'arco_modified'
		,'has_nss'
		,'has_no_experience'
		,'is_locked'
		,'is_v5'
		,'cache'
		,'cached_exposed_cases'
		,'cached_lawsuits'
		,'cached_recomendations'
		,'cached_references'
		,'cached_bulletins'
    ];






























}
