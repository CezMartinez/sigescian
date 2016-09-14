<?php

namespace App;

use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->belongsToMany(Model\Role::class);
    }
    
    protected function setFirstNameAttribute($firstName){
        $this->attributes['first_name'] = ucwords($firstName);
    }

    protected function setLastNameAttribute($lastName){
        $this->attributes['last_name'] = ucwords($lastName);

        $this->attributes['full_name'] =  $this->attributes['first_name'] . ' ' .$this->attributes['last_name'];

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
            'password' => bcrypt($data['password']),
        ]);
    }
}
