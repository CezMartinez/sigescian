<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','slug'];


    /**
     * A role have many permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Save a single permission
     *
     * @param $permissionIds
     */
    public function givePermissionTo($permissionIds)
    {
        $this->permissions()->attach($permissionIds);
    }

    /**
     * scope all the roles in the system
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function withPermission()
    {
        return Role::with('permissions')->get();
    }


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
        $this->attributes['slug'] = str_slug($name);
    }
    
    public static function createNewRole($attr)
    {
        $role = new static;

        $role->fill($attr);

        $role->save();

        return $role;
    }

}
