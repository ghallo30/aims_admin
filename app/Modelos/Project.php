<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    //
	protected $fillable = [
		'name',
		'cost',
		'remarks',
		'start_date',
		'end_date',
		'agency_id'
	];

	public function agencies(){
		return $this->belongsTo('App\Modelos\Agency');
	}
}
