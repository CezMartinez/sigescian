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
        return $this->belongsToMany(AdministrativeProcedure::class);
    }

    public function technicianProcedure()
    {
        return $this->belongsToMany(TechnicianProcedure::class);
    }
}
