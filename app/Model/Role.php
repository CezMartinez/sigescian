<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Collection;
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
    public static function fetchAll()
    {
        return Role::with('permissions')->paginate(5);
    }


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
        $this->attributes['slug'] = str_slug($name);
    }

    /**
     * Fetch all permission of the role with the slug given
     *
     * @param $slug
     * @return Collection
     */
    public static function permissionList($slug)
    {
        $role = new static;

        return $role->where('slug',$slug)->first()->permissions()->pluck('slug');
    }
    
    public static function createNewRole($attr)
    {
        $role = new static;

        $role->fill($attr);

        $role->save();

        return $role;
    }

}
