<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Role::fetchAll();

        return view('administration.roles.roles_index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionList = Permission::pluck('name','id');

        return view('administration.roles.roles_create',compact('permissionList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $permissionIds = $request->input('permission');
        
        $role = Role::createNewRole($request->all());
        
        $role->givePermissionTo($permissionIds);

        return redirect('/administracion/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $slug
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $slug
     */
    public function edit($slug)
    {
        $role = Role::with('permissions')->where('slug',$slug)->first();
        $permissionList = Permission::pluck('name','id')->toArray();
        $rolePermissionList = $role->permissions()->pluck('id','id')->toArray();


        return view('administration.roles.roles_edit',compact('role','permissionList','rolePermissionList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validator($request->all(),1)->validate();
        $role->update($request->all());
        if($request->input('permission') != null){
            $role->permissions()->sync($request->input('permission'));
        }
        //TODO: si los mermisos son vacios quitarlos todos


        return redirect('/administracion/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

    }

    protected function validator(array $data,$id=null,$userId=null)
    {
        if($id == 1){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'slug' => 'unique:roles,slug',
            ]);
        }

        return Validator::make($data, [
            'name' => 'required|max:255',
            'slug' => 'max:255',
        ]);


    }
    
}
