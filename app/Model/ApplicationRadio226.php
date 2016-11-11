<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplicationRadio226 extends Model
{

    protected $fillable=['petitioner','dui','address','phone','email','date_reception', 'state','samples','liters','gallons'];

    protected $dates =['date_reception'];

    public static function createSolicitude($request)
    {
        $applicationradio226 = new static;
        $applicationradio226->fill($request);
        $applicationradio226->save();
        return $applicationradio226;
    }

    public static function fetchAll()
    {
        $applicationradio226 = new static;

        return $applicationradio226->paginate(10);
    }

}
