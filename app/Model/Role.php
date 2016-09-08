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

    public function setMoneAttribute($name)
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

    public static function options($slug)
    {
        $role = new static;
        $rolePermissionList = $role->where('slug',$slug)->first()->permissions()->pluck('name');
        $permissionsList = Permission::pluck('name');

        $permissionsList->each(function($item,$key) use($rolePermissionList)
        {
            if($rolePermissionList->contains($item)){
                echo '<option selected>'.$item.'</option>';
            }else{
                echo '<option>'.$item.'</option>';
            }
        });
    }
}
