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
      /*  if(Plant::exists( $this->attributes['slug'])){
            abort(404,'Este material ya esta registrado');
        }*/
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

    public static function exists($name)
    {
        $plant = new static;

        $plant = $plant->where('slug',str_slug($name))->first();

        if($plant != null){
            return true;
        }

        return false;
    }
}