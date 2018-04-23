<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class CandidatoModel extends Model
{
    protected $table = "candidates";
    public $timestamps = false;
    public $fillable = [
			'id'
			,'account_person_id'
			,'user_id'
			,'assigned_to_user_id'
			,'candidate_source_id'
			,'mark_id'
			,'photo_dir'
			,'photo'
			,'score'
			,'is_filed'
			,'deleted'
			,'created'
			,'modified'

    ];
	
	
	
	



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



}
