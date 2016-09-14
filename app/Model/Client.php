<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['customer_type','name','legal_agent','address','nit','slug'];


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
        $this->attributes['slug'] = str_slug($name);
       /* if(Client::exists( $this->attributes['slug'])){
            abort(404,'Este cliente ya esta registrado');
        }*/
    }

    public static function fetchAll()
    {
        $client = new static;

        return $client->paginate(5);
    }

    public static function createNewClient($attr)
    {
        $client = new static;

        $client->fill($attr);

        $client->save();

        return $client;
    }
    public static function exists($name)
    {
        $client = new static;

        $client = $client->where('slug',str_slug($name))->first();

        if($client != null){
            return true;
        }

        return false;
    }
}
