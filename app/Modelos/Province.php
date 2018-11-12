<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Province extends Model
{
	//this is required by voyager for using coordinate field
	use Spatial;

	//model reference table
	protected $table = 'provinces';
    //
    protected $fillable = [
		'name',
		'land_area',
		'classification',
		'physical_desc',
	];

	public function municipality(){
		return $this->hasMany('App\Modelos\Municipality');
	}

	// public function agencies(){
	// 	return $this->hasMany('App\Modelos\Agency');
	// }

}
