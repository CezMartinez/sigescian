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
     * @param $permissionSelectedIds
     */
    public function givePermissionTo($permissionSelectedIds)
    {
        $permissions = Permission::findOrFail($permissionSelectedIds);

        foreach ($permissions as $permission){
            $slug = $permission->slug;
            $slugPieces = explode("-", $slug);
            if(str_contains($slugPieces[0],'crear') || str_contains($slugPieces[0],'editar') || str_contains($slugPieces[0],'eliminar')){
                $seePermission = Permission::where('slug',"ver-{$slugPieces[1]}")->first();
                $this->permissions()->attach($seePermission);
            }
        }

        $this->permissions()->attach($permissionSelectedIds);
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
    public static function getPermissionsSlug($slug)
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

    public function updateRolePermissions($permissionSelected)
    {
        if(! $this->hasSelectedPermissions($permissionSelected)){

            $this->updatePermission($permissionSelected);

        }else{

            $permissionIds = Permission::permissionIds();

            $this->removePermissions($permissionIds);
        }
    }

    public function updatePermission($permissionSelectedIds)
    {
        $permissions = Permission::findOrFail($permissionSelectedIds);

        foreach ($permissions as $permission){
            $slug = $permission->slug;
            $slugPieces = explode("-", $slug);
            if(str_contains($slugPieces[0],'crear') || str_contains($slugPieces[0],'editar') || str_contains($slugPieces[0],'eliminar')){
                $seePermission = Permission::where('slug',"ver-{$slugPieces[1]}")->first()->id;
                array_push($permissionSelectedIds,"{$seePermission}");
            }
        }
        $this->permissions()->sync($permissionSelectedIds);
    }

    private function removePermissions($permissionIds)
    {
        $this->permissions()->detach($permissionIds);
    }

    private function hasSelectedPermissions($permissionSelected)
    {
        return is_null($permissionSelected);
    }

}
