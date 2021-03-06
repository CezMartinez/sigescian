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
        $tienever = false;
        foreach ($permissions as $permission){
            if (strpos($permission->attributes['slug'], 'ver-') !== false) {
                $tienever = true;
            }
        }
        if(! $tienever){
            foreach ($permissions as $permission){
                $slug = $permission->slug;
                $slugPieces = explode("-", $slug);

                if(count($slugPieces)>2){
                    $p = "ver-{$slugPieces[1]}-{$slugPieces[2]}";
                }else{
                    $p = "ver-{$slugPieces[1]}";
                }
                if(str_contains($slugPieces[0],'crear') ||
                    str_contains($slugPieces[0],'editar') ||
                    str_contains($slugPieces[0],'eliminar') ||
                    str_contains($slugPieces[0],'calibrar'))
                {
                    $seePermission = Permission::where('slug',$p)->first();
                    array_push($permissionSelectedIds,$seePermission->id);
                }
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
    
    public static function createNewRole($attr,$permissionIds)
    {
        $role = new static;

        $role->fill($attr);

        $role->save();

        $role->givePermissionTo($permissionIds);


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

            if(count($slugPieces)>2){
                $p = "ver-{$slugPieces[1]}-{$slugPieces[2]}";
            }else{
                $p = "ver-{$slugPieces[1]}";
            }
            if(str_contains($slugPieces[0],'crear') || str_contains($slugPieces[0],'editar') || str_contains($slugPieces[0],'eliminar')){
                $seePermission = Permission::where('slug',$p)->first()->id;
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
