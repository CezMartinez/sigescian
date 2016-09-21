<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FlowChartFile extends Model
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
}
