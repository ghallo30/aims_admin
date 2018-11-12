<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

// need additional relationship for project and indicators

class Cooperative extends Model
{	
    //
    protected $fillable = [
		'name',
		'abbr',
		'description',
		'date_registered',
		'brgy_id',
		'centroid_points'
	];

	public function brgy(){
		return $this->belongsTo('App\Modelos\Brgy\Brgy');
	}

	public function coop_members(){
		return $this->belongsToMany('App\Modelos\Person\Person', 'CoopMember');
	}
}
