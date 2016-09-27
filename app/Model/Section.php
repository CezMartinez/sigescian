<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['section','route'];
    
    public function subsections()
    {
        return $this->belongsToMany(SubSection::class);
    }
}
