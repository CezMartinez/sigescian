<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable=['name','brand','model','slug','user_id','date_calibration','date_end_calibration'];

    protected $dates =['date_calibration','date_end_calibration'];


    public function user(){
        return $this->belongsTo(User::class);
    }

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

    public static function createPlant($request,User $user)
    {
        $plant = new static;

        $plant->fill($request);

        $plant->user()->associate($user);

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