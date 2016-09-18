<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $roles = Auth::user()->roles()->get();
            return $this->redirectByPermissions($roles);
        }

        return $next($request);
    }

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
