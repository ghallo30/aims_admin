<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = [
		'fname',
		'lname',
		'mname',
		'age',
		'gender',
		'blood_type',
		'contact_no',
		'religion',
		'occuppation',
		'civil_status',
		'centroid_points',
		'brgy_id'
	];

	public function brgy(){
		return $this->belongsTo('App\Modelos\Brgy');
	}

	public function cooperatives(){
		return $this->belongsToMany('App\Modelos\Cooperative', 'CoopMember');
	}
}
