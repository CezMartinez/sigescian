<?php

namespace App\Http\Controllers;

use App\Model\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Laboratory;
use Validator;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratories = Laboratory::fetchAll();
        //dd($laboratories);
        return view('laboratories.laboratories_index',compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name' ,'id')->toArray();
//        dd($departments);
        return view('laboratories.laboratories_create',compact('departments'));
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
        if(Laboratory::exists($request->input('name'))){
            flash('Laboratorio '.$request->input('name').' ya existe!', 'danger');
            return back()->withInput();
        }

        $departamento = Department::findOrFail($request->input('department'));

        flash('Laboratorio '.$request->input('name').' creado correctamente', 'success');


        Laboratory::createLaboratory($request->all(),$departamento);



        return redirect('/laboratorios');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $laboratory = Laboratory::with('department')->where('slug',$slug)->first();
        $departments = Department::pluck('name','id');
        $id = $laboratory->department->id;

        return view('laboratories.laboratories_edit',compact('laboratory','departments','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $laboratorio)
    {
        $laboratorio = $laboratorio->fill($request->all());
        $this->validator($request->all())->validate();

        if($laboratorio->getOriginal('slug') == $laboratorio->getAttribute('slug')){
            $laboratorio->update($request->all());
        }

        elseif($laboratorio->exists($request->input('name'))){
            flash('Laboratorio '.$request->input('name').' ya existe!', 'danger');
            return back()->withInput();
        }

        $departamento = Department::findOrFail($request->input('department'));

        $laboratorio->fill($request->all())->department()->dissociate();
        $laboratorio->department()->associate($departamento);

        $laboratorio->save();

        flash('Laboratorio '.$request->input('name').' editado correctamente', 'success');


        return redirect('/laboratorios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratorio)
    {
        $laboratorio->delete();
    }

    public function validator($data){
        return Validator::make($data,['name' => 'required','description' => 'required',]);
    }
}
