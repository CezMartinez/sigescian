<?php

namespace App\Model;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable=['name','brand','model','need_calibration','slug','days_of_calibration','user_id','date_calibration','date_end_calibration'];

    protected $dates =['date_calibration','date_end_calibration'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setDaysOfCalibrationAttribute($days){
        $this->attributes['date_end_calibration']= Carbon::parse($this->attributes['date_calibration'])->addDays($days)->toDateTimeString();
    }

    public function setNameAttribute($nameEquipment)
    {
        $this->attributes['name']=ucwords($nameEquipment);
        $this->attributes['slug']=str_slug($nameEquipment);
    }

    public static function fetchAll()
    {
        return Equipment::with('user')->paginate(5);
    }

    public static function createEquipment($request)
    {
        $equipment = new static;

        $equipment->fill($request);

        $equipment->save();

        return $equipment;
    }

    public static function exists($name)
    {
        $equipment = new static;
        $equipment = $equipment->where('slug',str_slug($name))->first();
        if($equipment != null){
            return true;
        }
        return false;
    }





}