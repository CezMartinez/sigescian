<?php

namespace App;

use App\Model\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','full_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    protected function setFirstNameAttribute($firstName){
        $this->attributes['first_name'] = ucwords($firstName);
    }

    protected function setLastNameAttribute($lastName){
        $this->attributes['last_name'] = ucwords($lastName);

        $this->attributes['full_name'] =  "{$this->attributes['first_name']}  {$this->attributes['last_name']}";

    }

    public function giveRoleOf($name)
    {
        $role = Role::where('name',$name)->first();

        $this->roles()->save($role);
    }

    public static function fetchAll()
    {
        $user = new static;

        return $user->with('roles')->paginate(5);
    }

    public function hasRole($role){
        return $this->roles()->get(['slug'])->pluck('slug')->contains($role);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public static function createUser(array $data)
    {
        $user = new static;
        
        return $user->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Update a user instance after a valid registration.
     * 
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data)
    {
        return $this->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }

    public function haveRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('slug',$role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function hasRoles()
    {
        return ($this->roles()->get()->count() > 0) ? true : false;
    }

    public function countPermissions()
    {
        $numpermission = 0;

        $roles = $this->roles()->get();

        foreach ($roles as $role){
            $numpermission = $numpermission + $role->permissions()->get()->count();
        }

        return $numpermission;
    }

    public function hasPermission($numPermissions)
    {
        return ($numPermissions > 0) ? true : false;
    }

    public function scopeGetTecnicos(){
        $users= DB::table('role_user')
            ->join('roles', function ($join) {
                $join->on('roles.id', '=', 'role_user.role_id');
            })
            ->join('users', function ($joi) {
                $joi->on('users.id', '=', 'role_user.user_id');
            })
            ->select('users.id','users.full_name')
            ->where('roles.name','Tecnico')
            ->get();
        return $users;
    }

    public function canSeeCatalog(){
        foreach ($this->roles()->getParent()->getRelations() as $u){
            foreach ($u->pluck('slug') as $r){
                $permission=Role::permissionList($r);
                if($permission->contains('ver-materiales')||$permission->contains('ver-equipos')||$permission->contains('ver-departamentos')||$permission->contains('ver-laboratorios')){
                    return true;
                }
            }
        }
        return false;
    }

    public function canSeeAdmin(){
        foreach ($this->roles()->getParent()->getRelations() as $u){
            foreach ($u->pluck('slug') as $r){
                $permission=Role::permissionList($r);
                if($permission->contains('ver-usuarios')||$permission->contains('ver-roles')){
                    return true;
                }
            }
        }
        return false;
    }


}
