<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\Section;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class AdministrativeController extends Controller
{
    /**
     * AdministrativeController constructor.
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
        $status = request()->exists('inactivos') ? '0' : '1';
        
        $admins = AdministrativeProcedure::fetchAllProceduresByState($status);

        return view('procedures.administrative.administrative_index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::pluck('section','id');
        return view('procedures.administrative.administrative_create',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCreateProcedure($request->all())->validate();

        $section = Section::find($request->input('section'));

        $procedure = AdministrativeProcedure::createAdministrative($request->all(),$section);
        
        if($request->has('subsection')){
            $procedure->subSections()->attach($request->input('subsection'));
        }

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
        $subsections = $administrativo->subSections()->get();
        $administrativo = $administrativo->with(['flowChartFile','annexedFiles','formatFiles','section'])->where('id',$administrativo->id)->first();
        return view('procedures.administrative.administrative_show',compact('administrativo','subsections'));
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
        $administrativo = $administrativo->fill($request->all());

        $newAcronym = $request->input('acronym');

        if (!$request->has('state')) {

            $administrativo->state='0';
        }
        else{

            $administrativo->state='1';
        }

        $this->validateUpdateProcedure($request->all(),$administrativo)->validate();


        if ($administrativo->exists($request->input('name'))) {

            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        flash('Procedimiento Actualizado', 'success');

        $administrativo->code = $administrativo->updateCodeWithAcronym($newAcronym,$administrativo);

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
            'acronym' => 'required|unique:administrative_procedures',
        ]);
    }

    private function validateUpdateProcedure($data,$procedure){
        return Validator::make($data,[
            'name' => 'required',
            'acronym' => 'unique:administrative_procedures,acronym,'.$procedure->id,
        ]);
    }
}
