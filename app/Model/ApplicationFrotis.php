<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplicationFrotis extends Model
{
    protected $fillable=['petitioner','address','phone','email'];

    public static function createSolicitude($request)
    {
        $applicationfrotis = new static;
        $applicationfrotis->fill($request);
        $applicationfrotis->save();
        return $applicationfrotis;
    }

    public static function fetchAll()
    {
        $applicationfrotis = new static;

        return $applicationfrotis->paginate(10);
    }
}
