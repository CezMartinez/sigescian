<?php

namespace App\Http\Controllers;

use App\Model\Department;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::fetchAll();

        return view('department.deparment_index',compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.deparment_create');
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
        if (Department::exists($request->input('name'))) {
            flash('El departamento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        Department::createDepartment($request->all());

        flash('Departamento Guardado', 'success');
        
        return redirect('departamentos');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $department = Department::where('slug',$slug)->first();
        
        return view('department.deparment_edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Department $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $departamento)
    {
        $departamento = $departamento->fill($request->all());
        $this->validator($request->all())->validate();

        if($departamento->getOriginal('slug') == $departamento->getAttribute('slug')){
            $departamento->update($request->all());
        }
        else {
            if ($departamento->exists($request->input('name'))) {
                flash('El departamento '.$request->input('name').' ya existe', 'danger');

                return back()->withInput();
            }
            flash('Departamento Actualizado', 'success');
            $departamento->update($request->all());
        }

        return redirect('/departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $departamento)
    {
        $departamento->delete();
    }

    public function validator($data)
    {
        return Validator::make($data,[
            'name' =>'required',
            'description' => 'required',
        ]);
    }
}
