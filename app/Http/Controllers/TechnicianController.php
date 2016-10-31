<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Laboratory;
use App\Model\Section;
use App\Model\Step;
use App\Model\TechnicianProcedure;
use Illuminate\Http\Request;
use Validator;


class TechnicianController extends Controller
{
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
        $techs = TechnicianProcedure::fetchAll();

        return view('procedures.technician.technician_index',compact('techs'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboratory = Laboratory::pluck('name','id');
        $sections= Section::pluck('section','id');
        return view('procedures.technician.technician_create',compact('laboratory', 'sections'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCreateProcedure($request->all());

        $section = Section::find($request->input('section'));
        $laboratory = Laboratory::find($request->input('laboratory_id'));

        $procedure = TechnicianProcedure::createTechnician($request->all(),$section, $laboratory);

        if($request->has('subsection')){
            $procedure->subSections()->attach($request->input('subsection'));
        }

        flash('Procedimiento Guardado', 'success');

        return redirect("/procedimientos/tecnicos/{$procedure->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param TechnicianProcedure $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicianProcedure $tecnico)
    {
        $subsections = $tecnico->subSections()->get();
        $tecnico = $tecnico->with(['annexedFiles','section'])->where('id',$tecnico->id)->first();
        return view('procedures.technician.technician_show',compact('tecnico','subsections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $procedure = TechnicianProcedure::where('code',$code)->first();
        return view('procedures.technician.technician_edit',compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param TechnicianProcedure $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TechnicianProcedure $tecnico)
    {
        $tecnico = $tecnico->fill($request->all());

        $newAcronym = $request->input('acronym');

        if (!$request->has('state')) {

            $tecnico->state='0';
        }
        else{

            $tecnico->state='1';
        }

        $this->validateUpdateProcedure($request->all(),$tecnico);


        if ($tecnico->exists($request->input('name'))) {

            flash('El procedimiento '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        flash('Procedimiento Actualizado', 'success');

        $tecnico->code = $tecnico->updateCodeWithAcronym($newAcronym,$tecnico);

        $tecnico->save();


        return redirect('/procedimientos/tecnicos');
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

    public function steps(Request $request, $procedure){
        $tecnico = TechnicianProcedure::findOrFail($procedure);
        foreach($request->input('steps') as $s){
            $paso =Step::create([
               'step'=>$s,
            ]);
            $tecnico->steps()->attach($paso);
        }
        return redirect("/procedimientos/tecnicos/{$procedure}");
    }

    private function validateCreateProcedure($data)
    {
        return Validator::make($data,[
            'name' =>'required',
            'acronym' => 'required|unique:technician_procedures,acronym',
        ])->validate();
    }

    private function validateUpdateProcedure($data,$procedure){
        return Validator::make($data,[
            'name' => 'required',
            'acronym' => 'unique:technician_procedures,acronym,'.$procedure->id,
        ])->validate();
    }
}
