<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplicationControl extends Model
{

    protected $fillable=['name','customer_id','address','municipality','department','country',
        'phone','fax','email', 'responsable','position','activity_id','date_reception','name_visit',
        'position_visit','phone_visit','name_admin', 'position_admin', 'phone_admin'];

    protected $dates =['date_reception'];

    public function customer(){
        return $this->belongsTo(CustomerType::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public static function createSolicitude($request,CustomerType $customerType,Activity $activity)
    {
        $applicationcontrol = new static;

        $applicationcontrol->fill($request);

        $applicationcontrol->customer()->associate($customerType);

        $applicationcontrol->activity()->associate($activity);

        $applicationcontrol->save();

        return $applicationcontrol;
    }

    public static function fetchAll()
    {
        $applicationcontrol = new static;

        return $applicationcontrol->paginate(10);
    }
}
