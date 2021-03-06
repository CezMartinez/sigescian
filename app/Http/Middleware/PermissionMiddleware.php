<?php

namespace App\Http\Middleware;

use App\Model\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public $permissionsNeeded;


    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param array ...$permissions
     * @return mixed
     */
    public function handle($request, Closure $next,...$permissions)
    {

        $permissions = collect($permissions);

        $this->permissionsNeeded = $permissions;

        $isAuthenticated = Auth::check();

        if($isAuthenticated){

            $userRoles = Auth::user()->roles()->get();

            if($this->findPermissionsInTheRolesOffTheUser($permissions,$userRoles)){

                return $next($request);
            }

            if($request->ajax())
            {

                return response('Error no tiene permiso para realizar la accion deseada contacte al administrador de sistema.',404);
            }

            return $this->redirectWhereBelongsByRolePermission($userRoles);

        }

        if($request->ajax())
        {
            return response('Debes estar logeado',404);
        }


    }

    /**
     * Find the in the roles of the authenticated user the necessary permission to get access.
     *
     * @param $permissions
     * @param $userRoles
     * @return bool
     */
    private function findPermissionsInTheRolesOffTheUser($permissions, $userRoles)
    {

        foreach ($userRoles as $role) {

            $rolePermissions = Role::getPermissionsSlug($role->slug);

            foreach ($permissions as $permission){

                $havePermission = $rolePermissions->contains($permission);

                if($havePermission) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Redirect base upon the permission of the authenticated user
     *
     * @param $userRoles
     * @return mixed
     */
    private function redirectWhereBelongsByRolePermission($userRoles)
    {
        if(! $this->hasRole()){

            return $this->logoutUserWithErrors();

        }

        flash(ucwords("No tienes permisos para {$this->permissionsNeeded()}. solicita permisos al administrador del sistema"),'danger')->important();

        return $this->redirectByPermissions($userRoles);

    }

    /**
     * Verify is the authenticated user has roles
     *
     * @return bool
     */
    private function hasRole()
    {
        return (Auth::user()->roles()->count() > 0) ? true : false;
    }

    /**
     * Logout the user with any errors
     *
     * @return mixed
     */
    private function logoutUserWithErrors()
    {
        Auth::logout();

        flash(ucwords('No tienes roles asignados, consulta al administrador del sistema'),'danger')->important();

        return redirect('/login');
    }

    /**
     * Redirect the users to some place his has permission to access
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

            }elseif ($permission->contains('ver-equipos')){

                return redirect('/equipos');

            }elseif ($permission->contains('ver-materiales')){

                return redirect('/materiales');

            }elseif ($permission->contains('ver-departamentos')){

                return redirect('/departamentos');

            }elseif ($permission->contains('ver-laboratorios')){

                return redirect('/laboratorios');
            }elseif ($permission->contains('ver-procedimientos-tecnicos')){

                return redirect('/procedimientos/tecnicos');
            }elseif ($permission->contains('ver-procedimientos-generales')){

                return redirect('/procedimientos/administrativos');
            } elseif ($permission->contains('calibrar-equipos')){

                return redirect('/equipos');
            }elseif ($permission->contains('ver-documentos')){

                return redirect('/documentos/procedimiento');
            }else{
                return redirect('/listaMaestra');
            }

        }
    }

    /**
     * retrieve message if the user don have permission to access
     *
     * @return mixed
     */
    public function permissionsNeeded()
    {
        return ucwords(str_replace('-',' ',$this->permissionsNeeded->implode(', ')));
    }
}
