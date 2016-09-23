<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    public function sections(){
        $this->belongsTo(Section::class);
    }
}
