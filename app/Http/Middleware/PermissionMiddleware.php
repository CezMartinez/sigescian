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

        $isAuthenticated = Auth::check();

        if($isAuthenticated){

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

            $roles = $authenticatedUser->roles()->get();
            if($roles->count() > 0){
                return $this->redirectByPermissions($roles);
            }else{
                Auth::logout();
                flash('No tienes roles asignados, consulta al administrador del sistema','danger');
                return redirect('/login');
            }

        }

        if($request->ajax())
        {
            return response('Debes estar logeado',404);
        }
    }

    /**
     * Redirect the users to the place his has permission
     *
     * @param $roles
     * @return mixed
     */
    protected function redirectByPermissions($roles)
    {
        foreach ($roles as $role){
            $permission = $role->permissions()->get()->pluck('slug');

            if($permission->contains('ver-usuarios')){
                return redirect('/administracion/usuarios');
            }elseif ($permission->contains('ver-roles')){
                return redirect('/administracion/roles');
            }elseif ($permission->contains('ver-clientes')){
                return redirect('/clientes');
            }elseif ($permission->contains('ver-equipos')){
                return redirect('/equipos');
            }elseif ($permission->contains('ver-materiales')){
                return redirect('/materiales');
            }elseif ($permission->contains('ver-departamentos')){
                return redirect('/departamentos');
            }elseif ($permission->contains('ver-laboratorios')){
                return redirect('/laboratorios');
            }
        }
    }
}
