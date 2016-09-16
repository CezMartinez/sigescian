<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdministrativeProcedure extends Model
{
    protected $fillable = ['code','name','acronym'];

    public static function fetchAll()
    {
        $admin = new static;
        return $admin->paginate(5);
    }

    protected function setNameAttribute($name){
        $this->attributes['name'] = ucwords('Procedimiento Administrativo de '.$name);
    }

    protected function setAcronymAttribute($acronym){
        $this->attributes['acronym'] = strtoupper(trim($acronym));

        $procedimiento = $this->first();

        if(!$procedimiento){
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN1';

        }else{
            $ultimo = $this->orderBy('created_at', 'desc')->first();
            $this->attributes['code'] = 'PG-'.$this->attributes['acronym'].'-CIAN'.($ultimo->id+1);
        }
    }

    public static function createAdministrative($data){
        $admin = new static;
        return $admin->create($data);
    }

    public static function exists($name)
    {
        $admin = new static;

        $admin = $admin->where('name',$name)->first();

        if($admin != null){
            return true;
        }

        return false;
    }
}
