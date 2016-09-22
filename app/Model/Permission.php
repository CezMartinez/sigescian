<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','slug'];

    public static function permissionIds()
    {
        $permission = new static;

        return $permission->pluck('id','id')->toArray();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
