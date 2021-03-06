<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Role;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

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
        $users = User::with(['roles' => function ($query) { $query->where('slug','tecnico'); }])->get();
        
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

        if($rolesIds!=null){
            $user->roles()->sync($rolesIds);
        }

        flash('Usuario creado exitosamente','success');

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

        if($usuario->id != 1){

            if($roleIds == null){

                $roleList = Role::pluck('id','id')->toArray();

                $usuario->roles()->detach($roleList);

            }else{

                $usuario->roles()->sync($roleIds);

            }
        }else{
            flash('Los roles de este usuario no son editables','warning');

            return redirect('administracion/usuarios');
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
                return response("El Usuario {$user->first_name} fue eliminado",200);
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

    public function profile(){
        $user = User::profile();
        return view('administration.users.users_change',compact('user'));
    }

    public function change(Request $request,$id){
        $user = User::findOrFail($id);
        $validation = Validator::make($request->all(), [
            'password' => 'hash:' . $user->password,
            'password_new' => 'required|different:password',
            'password_confirmation'=>'required|same:password_new'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->input('password_new'));
        $user->save();
        flash('La contraseña ha sido modificada','success');

        return redirect()->back();
    }


}
