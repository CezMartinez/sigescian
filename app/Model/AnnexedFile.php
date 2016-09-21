<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class AnnexedFile extends Model
{
    public static function boot() {
        parent::boot();

        // Delete the image from the filesystem after deleting our database entry.
        static::deleted(function($model){
            (new Filesystem)->delete($model->path);
        });
    }

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
