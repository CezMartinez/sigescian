<?php

namespace App\Http\Middleware;

use App\Model\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param array $permissions
     * @return mixed
     * @internal param array $permission
     * @internal param $permission
     */
    public function handle($request, Closure $next,...$permissions)
    {

        $permissions = collect($permissions);

        $authenticatedUser = Auth::user();
        $userRoles = $authenticatedUser->roles()->pluck('slug');

        foreach ($userRoles as $key => $value) {
            $rolePermissions = Role::where('slug',$value)->first()->permissions()->pluck('slug');
            foreach ($permissions as $permission){
                $havePermission = $rolePermissions->contains($permission);

                if($havePermission) {
                    return $next($request);
                }
            }
        }

        if($request->ajax())
        {
            return response('Error no tiene permiso para realizar la accion deseada contacte al administrador de sistema.',404);
        }

        flash('Error, No tiene permiso para realizar la accion deseada contacte al administrador de sistema.','danger');
        return back();

        return $next($request);
    }
}
