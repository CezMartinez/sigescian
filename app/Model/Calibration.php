<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Calibration extends Model
{
    protected $fillable=['months_of_calibration','calibrate_company','date_calibration','date_end_calibration','equipment_id'];

    protected $dates =['date_calibration','date_end_calibration'];

    public static function addCalibration($request, Equipment $equi)
    {
        $calibration = new static;

        $calibration->fill($request);

        $calibration->equipment()->associate($equi);

        $calibration->save();

        return $calibration;
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function setMonthsOfCalibrationAttribute($days){
        $this->attributes['months_of_calibration'] = $days;
        $this->attributes['date_end_calibration']= Carbon::parse($this->attributes['date_calibration'])->addMonths($days)->toDateTimeString();
    }

    public function setDateCalibrationAttribute($date){
        $this->attributes['date_calibration']=
            Carbon::createFromFormat('Y-m-d H:i:s',$date .' '. Carbon::now()->toTimeString())->toDateTimeString();
    }

}