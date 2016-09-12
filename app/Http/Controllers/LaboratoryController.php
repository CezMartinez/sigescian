<?php

namespace App\Http\Controllers;

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
        return view('laboratories.laboratories_create');
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
        Laboratory::createLaboratory($request->all());
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
        $laboratories = Laboratory::where('slug',$slug)->first();
        return view('laboratories.laboratories_edit',compact('laboratories'));
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
        $this->validator($request->all())->validate();
        $laboratorio->update($request->all());
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
