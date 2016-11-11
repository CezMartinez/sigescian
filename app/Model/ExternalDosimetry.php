<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExternalDosimetry extends Model
{
    protected $fillable=['name','customer_id','address','municipality','department','country',
        'phone','fax','email', 'responsable','position','dui','activity_id','date_reception','name_visit',
        'position_visit','phone_visit','name_admin', 'position_admin', 'phone_admin','pd_number','anillo_number','state'];

    public function customer(){
        return $this->belongsTo(CustomerType::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public static function createSolicitude($request,CustomerType $customerType,Activity $activity)
    {
        $externaldosimetry = new static;

        $externaldosimetry->fill($request);

        $externaldosimetry->customer()->associate($customerType);

        $externaldosimetry->activity()->associate($activity);

        $externaldosimetry->save();

        return $externaldosimetry;
    }

    public static function fetchAll()
    {
        $externaldosimetry = new static;

        return $externaldosimetry->paginate(10);
    }
}
