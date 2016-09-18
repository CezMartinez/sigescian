<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AdministrativeProcedure::fetchAll();

        return view('procedures.administrative.administrative_index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procedures.administrative.administrative_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: falta debuguear el store del metodo guardar

        $this->validateCreateProcedure($request->all())->validate();

        if (AdministrativeProcedure::exists($request->input('acronym'))) {

            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        $procedure = AdministrativeProcedure::createAdministrative($request->all());

        flash('Procedimiento Guardado', 'success');

        return redirect("/procedimientos/administrativos/{$procedure->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param AdministrativeProcedure $administrativo
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrativeProcedure $administrativo)
    {

        return view('procedures.administrative.administrative_show',compact('administrativo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $procedure = AdministrativeProcedure::where('code',$code)->first();
        return view('procedures.administrative.administrative_edit',compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AdministrativeProcedure $administrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AdministrativeProcedure $administrativo)
    {
        //TODO: falta debuguear el store del metodo actualizar
        /*$procedure = AdministrativeProcedure::where('code',$procedure)->first();*/
        $administrativo->name=$request->input('name');
        if (!$request->has('state')) {
            $administrativo->state='0';
        }
        else{
            $administrativo->state='1';
        }

        $this->validateUpdateProcedure($request->all())->validate();


        if ($administrativo->exists($request->input('name'))) {
            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }
        flash('Procedimiento Actualizado', 'success');
        $administrativo->save();


        return redirect('/procedimientos/administrativos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateCreateProcedure($data)
    {
        return Validator::make($data,[
            'name' =>'required',
            'acronym' => 'required',
        ]);
    }

    private function validateUpdateProcedure($data){
        return Validator::make($data,[
            'name' => 'required',
        ]);
    }
}
