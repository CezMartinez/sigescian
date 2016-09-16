<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','description','slug'];

    public static function fetchAll()
    {
        $department = new static;

        return $department->paginate(5);
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords($name);
        $this->attributes['slug'] = str_slug($name);
    }

    public static function createDepartment($data){
        $department = new static;
        return $department->create($data);
    }

    public static function exists($name)
    {
        $department = new static;
        
        $department = $department->where('slug',str_slug($name))->first();

            if($department != null){
                return true;
            }

        return false;
    }

}
