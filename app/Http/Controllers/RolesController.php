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

        flash("El rol fue creado correctamente",'success');

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
        if($role->slug != 'administrador'){
            $this->validator($request->all(),1)->validate();

            $role->update($request->all());

            if($request->input('permission') != null){
                $role->permissions()->sync($request->input('permission'));
            }else{
                $permissionIds = Permission::pluck('id','id')->toArray();
                $role->permissions()->detach($permissionIds);
            }
        }else{
            flash('El rol administrador no se puede modificar','warning');
        }

        flash("El rol fue modificado correctamente",'success');


        return redirect('/administracion/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Role $role)
    {
        if($role->slug !=  'administrador-del-sistema'){
            $wasDeleted = $role->delete();

            if($request->ajax()){
                if($wasDeleted){
                    return response("El Rol {$role->name} fue eliminado",200);
                }else{
                    return response("No fue eliminado.",404);
                }
            }
        }else{
            if($request->ajax()){
                return response("El rol administrador no puede ser eliminado",404);
            }
        }

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
