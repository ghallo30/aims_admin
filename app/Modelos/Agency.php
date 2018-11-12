<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Agency extends Model
{
	//this is required by voyager for using coordinate field
	use Spatial;

	//model reference table
	protected $table = 'agencies';

	protected $fillable = [
		'name',
		'abbr',
		'component_id'
	];

	public function projects(){
		return $this->hasMany('App\Modelos\Project');
	}

	public function components(){
		return $this->belongsTo('App\Modelos\Component');
	}
}
