<?php

namespace App\Providers;

use App\Model\Permission;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param Gate $gate
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        foreach($this->getPermissions() as $permission){
            $gate->define($permission->slug, function($user) use ($permission){
                return $user->haveRole($permission->roles);
            });
        }
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
