<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CandidateJobOffersModel extends Model
{

	protected $connection = "blm_mysql";
	protected $table = "candidates_job_offers";
	public $timestamps = false;
    public $fillable = [
    	'id'
		,'candidate_id'
		,'job_offer_id'
		,'recruitment_stage_id'
		,'created_by_user_id'
		,'assigned_to_user_id'
		,'account_client_id'
		,'rating'
		,'disqualified'
		,'disqualify_reason_id'
		,'is_from_sde'
		,'created'
		,'modified'
    ];

}
