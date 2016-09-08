<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable=['plantName','plantBrand','plantModel','slug'];

    public function setNameAttribute($namePlant)
    {
        $this->attributes['plantName']=ucwords($namePlant);
        $this->attributes['slug']=str_slug($namePlant);
    }

}
