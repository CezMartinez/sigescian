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

    protected function redirecByPermission($user)
    {
        $roles = $user->roles()->get();

        foreach ($roles as $role){

            $permission = $role->permissions()->get()->pluck('slug');

            if($permission->contains('ver-usuarios')){

                return '/administracion/usuarios';

            }elseif ($permission->contains('ver-roles')){

                return '/administracion/roles';

            }elseif ($permission->contains('ver-clientes')){

                return '/clientes';

            }elseif ($permission->contains('ver-equipos')){

                return '/equipos';

            }elseif ($permission->contains('ver-materiales')){

                return '/materiales';

            }elseif ($permission->contains('ver-departamentos')){

                return '/departamentos';

            }elseif ($permission->contains('ver-laboratorios')){

                return '/laboratorios';

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
        if($user->roles()->get()->count() > 0){

            $this->redirectTo = $this->redirecByPermission($user);

        }else{

            Auth::logout();

            flash('No Tienes Roles o Permisos asignados, Consulta al administrador del sistema','danger');

            return redirect('/login');
        }
    }
}
