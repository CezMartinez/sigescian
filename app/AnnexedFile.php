<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnexedFile extends Model
{
    protected $fillable = ['path','name','size','originalName'];

    
}
