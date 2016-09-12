<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable=['name','brand','model','slug'];

    public function setNameAttribute($namePlant)
    {
        $this->attributes['name']=ucwords($namePlant);
        $this->attributes['slug']=str_slug($namePlant);
    }

    public static function fetchAll()
    {
        $plant = new static;

        return $plant->paginate(5);
    }

    public static function createPlant($request)
    {
        $plant = new static;

        $plant->fill($request);

        $plant->save();

        return $plant;
    }
}