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

    public function edit($code)
    {
        $procedure = AdministrativeProcedure::where('code',$code)->first();
        return view('procedures.administrative.administrative_edit',compact('procedure'));
    }

    public function show(AdministrativeProcedure $procedure)
    {
        return view('procedures.administrative.administrative_show',compact('procedure'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        if (AdministrativeProcedure::exists($request->input('acronym'))) {
            
            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        $procedure = AdministrativeProcedure::createAdministrative($request->all());

        flash('Procedimiento Guardado', 'success');

        return redirect("/procedimientos/administrativos/{$procedure->code}");

    }

    public function update(Request $request, $procedure)
    {

        $procedure = AdministrativeProcedure::where('code',$procedure)->first();
        $procedure->name=$request->input('name');
        if (!$request->has('state')) {
            $procedure->state='0';
        }
        else{
            $procedure->state='1';
        }
        //dd($procedure);
        $this->validateUpdateProcedure($request->all())->validate();


            if ($procedure->exists($request->input('name'))) {
                flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

                return back()->withInput();
            }
            flash('Procedimiento Actualizado', 'success');
            $procedure->save();


        return redirect('/procedimientos/administrativos');
    }

    public function changeStatus(Request $request,AdministrativeProcedure $procedure)
    {
        dd($procedure);
    }

    public function validateCreateProcedure($data)
    {
        return Validator::make($data,[
            'name' =>'required',
            'acronym' => 'required',
        ]);
    }
    public function validateUpdateProcedure($data){
        return Validator::make($data,[
            'name' => 'required',
        ]);
    }


}
