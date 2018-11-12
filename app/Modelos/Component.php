<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
	
	protected $fillable = [
		'name',
		'slug',
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function projects(){
		return $this->hasMany('App\Modelos\Project');
	}

	public function agencies(){
		return $this->hasMany('App\Modelos\Agency');
	}

}
