<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FormatFile extends Model
{
    protected $fillable = [
        'code',
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
        return $this->belongsToMany(AdministrativeProcedure::class)->withPivot('owner');
    }

    public function technicianProcedure()
    {
        return $this->belongsToMany(TechnicianProcedure::class)->withPivot('owner');
    }

    public function typeOfProcedure()
    {
        if($this->administrativeProcedure()->where('owner',true)->get()->count()>=1){
            return 1;
        }
        return 2;

    }
    
    
}
