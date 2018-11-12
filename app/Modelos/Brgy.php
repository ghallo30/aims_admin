<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Brgy extends Model
{
	
	//
	protected $table = 'brgys';

	protected $fillable = [
		'name',
		'physical_desc',
		'latest_era',
		'ratification_date',
		'date_brgy_created',
		'market_day',
		'fiest_day',
		'means_of_transpo',
		'means_of_communication',
		'brgy_classification',
		'brgy_type',
		'legal_creation_basis',

		'land_area',
		'boundaries_north',
		'boundaries_south',
		'boundaries_east',
		'boundaries_west',
		'congressional_district',
		'total_percints',
		'total_voters',
		'major_crops',
		'agricultural_land_utilized',
		'agricultural_land_covered',
		'anti_drug_council',

		'contact_no',
		'email_address',
		'centroid_points',

		'municipality_id',

		'submitted',

	];

	// public function cooperatives(){
	// 	return $this->hasMany('App\Modelos\Cooperative');
	// }

	// public function people(){
	// 	return $this->hasMany('App\Modelos\Person');
	// }
	
	public function getPaerentAttr(){
		return 'municipality_id';
	}

	public function getChkFilledDuplicate(){
		return ['name', 'municipality_id'];
	}

	public function municipality(){
		return $this->belongsTo('App\Modelos\Municipality');
	}

}
