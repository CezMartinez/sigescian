<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::fetchAll();

        return view('administration.users.users_index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleList = Role::pluck('name','id');

        return view('administration.users.users_create',compact('roleList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rolesIds = $request->input('roles');

        $this->validateCreateUser($request->all())->validate();

        $user = User::createUser($request->all());

        $user->roles()->sync($rolesIds);

        return redirect('administracion/usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param User $usuario
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(User $usuario)
    {
        dd($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param User $id
     */
    public function edit(User $user)
    {
        $roleList = Role::pluck('name','id');

        $userRoleList = $user->roles->pluck('id')->toArray();

        return view('administration.users.users_edit',compact('roleList','user','userRoleList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $usuario)
    {
        $roleIds = $request->input('roles');

        $this->validateUpdateUser($usuario,$request->all())->validate();

        $usuario->updateUser($request->all());

        if($roleIds == null){
            $roleList = Role::pluck('id','id')->toArray();
            $usuario->roles()->detach($roleList);
        }else{
            $usuario->roles()->sync($roleIds);

        }

        flash('El usuario fue actualizado correctamente','success');

        return redirect('administracion/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request,User $user)
    {
        $wasDeleted = $user->delete();

        if($request->ajax()){
            if($wasDeleted){
                return response("El Rol {$user->first_name} fue eliminado",200);
            }else{
                return response("No fue eliminado.",404);
            }
        }
    }


    protected function validateCreateUser(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

    }

    protected function validateUpdateUser(User $user,array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id
        ]);

    }


}
