<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
 	protected $fillable = ['name','description','slug'];

 	public static function fetchAll()
 	{
 		$laboratory = new static;

 		return $laboratory->all();
 	}

 	protected function setNameAttribute($name)
 	{
 		$this->attributes['name'] = ucwords($name);
 		$this->attributes['slug'] = str_slug($name);
 	}

 	public static function createLaboratory($data){
 		$laboratory = new static;
 		$laboratory->fill($data);
 		$laboratory->save();
 		return $laboratory;
 	}
 	
}


