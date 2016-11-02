<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect searching in the permission of the user
     *
     * @param $user
     * @return string
     */
    protected function redirecByPermission($user)
    {
        $roles = $user->roles()->get();

        foreach ($roles as $role){

            $permission = $role->permissions()->get()->pluck('slug');

            if($permission->contains('ver-usuarios')){

                return '/administracion/usuarios';

            }elseif ($permission->contains('ver-roles')){

                return '/administracion/roles';

            }elseif ($permission->contains('ver-equipos')){

                return '/equipos';

            }elseif ($permission->contains('ver-materiales')){

                return '/materiales';

            }elseif ($permission->contains('ver-departamentos')){

                return '/departamentos';

            }elseif ($permission->contains('ver-laboratorios')){

                return '/laboratorios';

            }elseif ($permission->contains('ver-procedimientos-tecnicos')){

                return '/procedimientos/tecnicos';
            }elseif ($permission->contains('ver-procedimientos-generales')){

                return '/procedimientos/administrativos';
            }elseif ($permission->contains('calibrar-equipos')){

                return '/equipos';
            }
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->get();
        if(!$this->hasRoles($roles)){

            return $this->logoutUserWithErrorMessage('roles');

        }

        if (! $this->hasPermission($this->countPermissions($roles))) {

            return $this->logoutUserWithErrorMessage('permission');

        }

        $this->redirectTo = $this->redirecByPermission($user);
    }

    /**
     * verify is the login users has roles in the system
     *
     * @param $roles
     * @return bool
     */
    public function hasRoles($roles)
    {
        return ($roles->count() > 0) ? true : false;
    }

    /**
     * count the permissions of the login user
     *
     * @param $roles
     * @return int
     */
    public function countPermissions($roles)
    {
        $numpermission = 0;

        foreach ($roles as $role){
            $numpermission = $numpermission + $role->permissions()->get()->count();
        }

        return $numpermission;
    }

    /**
     * verify if the login user has permission
     *
     * @param $numPermissions
     * @return bool
     */
    public function hasPermission($numPermissions)
    {
        return ($numPermissions > 0) ? true : false;
    }

    /**
     * Logout the uses
     *
     * @param $mensaje
     * @return mixed
     */
    public function logoutUserWithErrorMessage($mensaje)
    {
        Auth::logout();

        flash(ucwords("No tienes {$mensaje} asignados, Consulta al administrador del sistema"),'danger')->important();
        
        return redirect('/login');
    }
}
