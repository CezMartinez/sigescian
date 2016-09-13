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

        $this->validator($request->all())->validate();

        $user = $this->createUser($request->all());

        $user->roles()->sync($rolesIds);

        return redirect('administracion/usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roleIds = $request->input('roles');
        $this->validator($request->all(),1,$user->id)->validate();
        $user->update($request->all());
        $user->roles()->sync($roleIds);

        return redirect('administracion/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
    }


    protected function validator(array $data,$id=null,$userId=null)
    {
        if($id == 1){
            return Validator::make($data, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$userId,
                'password' => 'min:6|confirmed',
            ]);
        }

        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
