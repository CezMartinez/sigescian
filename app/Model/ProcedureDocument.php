<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProcedureDocument extends Model
{
    protected $fillable = [
        'path',
        'originalName',
        'nameWithoutExtension',
        'title',
        'size',
        'mime',
        'extension'
    ];

    public function administrativeProcedure()
    {
        return $this->hasOne(AdministrativeProcedure::class);
    }

    public function technicianProcedure()
    {
        return $this->hasOne(TechnicianProcedure::class);
    }

    public function typeOfProcedure(){
        if($this->administrativeProcedure()->count()>=1){
            return 1;
        }
        return 2;
    }
}
