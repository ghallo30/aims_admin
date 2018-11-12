<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CoopMember extends Model
{
	//
	 protected $fillable = [
		'membership_status',
		'membership_added',
		'position',
		
		'coop', //cooperative id
		'member' //person id
		
	];

	// public function cooperatives(){
	// 	return $this->belongsTo('App\Modelos\Cooperative');
	// }

	// public function people(){
	// 	return $this->belongsTo('App\Modelos\People');
	// }
}
