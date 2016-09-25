<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable=['stock_number','name','brand','model','need_calibration','slug','days_of_calibration','calibration_company','date_calibration','date_end_calibration','laboratory_id'];

    protected $dates =['date_calibration','date_end_calibration'];


    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
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
        $equipment = new static;

        return $equipment->paginate(5);
    }

    public static function createEquipment($request, Laboratory $lab)
    {
        $equipment = new static;

        $equipment->fill($request);

        $equipment->laboratory()->associate($lab);


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