<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FormatFile extends Model
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
