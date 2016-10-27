<?php

namespace App\Model;

use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{
    protected $fillable=['stock_number','name','brand','model','need_calibration','slug','laboratory_id'];

    public function laboratory(){
        return $this->belongsTo(Laboratory::class);
    }


    public function setNameAttribute($nameEquipment)
    {
        $this->attributes['name']=ucwords($nameEquipment);
        $this->attributes['slug']=str_slug(ucwords($nameEquipment));

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

    /**
     * @return bool
     */
    public function needCalibrate(){
        if($this->need_calibration==1){
            $latest = Calibration::where('equipment_id',$this->id)->get()->last();
            if($latest!=null){
                if($latest->date_end_calibration<=Carbon::now()){
                    return true;
                }
                return false;
            }
            return true;
        }
        return false;
    }

}