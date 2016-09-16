<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\AdministrativeProcedure;
use Validator;


class AdministrativeProceduresController extends Controller
{
    public function index()
    {
        $admins = AdministrativeProcedure::fetchAll();
        return view('procedures.administrative.administrative_index',compact('admins'));
    }

    public function create()
    {
        return view('procedures.administrative.administrative_create');
    }

    public function edit(AdministrativeProcedure $procedure)
    {
        return view('procedures.administrative.administrative_edit',compact('procedure'));
    }

    public function show(AdministrativeProcedure $procedure)
    {
        return view('procedures.administrative.administrative_show',compact('procedure'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validator($request->all())->validate();
        if (AdministrativeProcedure::exists($request->input('name'))) {
            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        AdministrativeProcedure::createAdministrative($request->all());

        flash('Procedimiento Guardado', 'success');

        return redirect('/procedimientos/administrativos');

    }

    public function update(Request $request,AdministrativeProcedure $procedure)
    {
        dd($request->all());
    }

    public function changeStatus(Request $request,AdministrativeProcedure $procedure)
    {
        dd($procedure);
    }

    public function validator($data)
    {
        return Validator::make($data,[
            'name' =>'required',
            'acronym' => 'required',
        ]);
    }
}
