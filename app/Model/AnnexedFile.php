<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class AnnexedFile extends Model
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
        return $this->belongsToMany(AdministrativeProcedure::class)->withPivot(['owner','active']);
    }

    public function technicianProcedure()
    {
        return $this->belongsToMany(TechnicianProcedure::class)->withPivot(['owner','active']);
    }

    public function typeOfProcedure()
    {
        if($this->administrativeProcedure()->where('owner',true)->get()->count()>=1){
            return 1;
        }
        return 2;

    }
}
