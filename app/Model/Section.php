<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function subsections(){
        $this->hasMany(SubSection::class);
    }
}
