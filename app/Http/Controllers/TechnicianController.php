<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Laboratory;
use App\Model\Section;
use App\Model\Step;
use App\Model\TechnicianProcedure;
use Illuminate\Http\Request;
use JavaScript;
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
        $state = request()->exists('inactivos') ? '0' : '1';
        
        $techs = TechnicianProcedure::fetchAllProcedureByState($state);

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
        $tecnico = $tecnico->with(['procedureDocument','annexedFiles','section'])->where('id',$tecnico->id)->first();
        
        JavaScript::put([
            'id_tecnico' => $tecnico->id,
        ]);
        
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
        $this->validateUpdateProcedure($request->all(),$tecnico);

        $result = $tecnico->updateProcedure($request);

        if($result['hasError']) {

            flash($result['message'], 'danger');

            return back()->withInput();
        }

        flash($result['message'], 'success');

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


        $instrucciones = $request->input("steps");

        $id_instrucciones = $request->input("id_instrucciones");
        $tecnico = TechnicianProcedure::findOrFail($procedure);

        $numero_de_instrucciones = count($tecnico->steps()->get());

        if($numero_de_instrucciones == 0){
            foreach($instrucciones as $instruccion){
                $paso = Step::create([
                    'step'=>$instruccion,
                ]);
                $tecnico->steps()->attach($paso);
            }
        }

        foreach($instrucciones as $instruccion){
            $instruccion_step = Step::where('step',$instruccion)->first();
            if(is_null($instruccion_step)){
                Step::create([
                    'step'=>$instruccion,
                ]);
            }
        }

        $tecnico->steps()->sync($id_instrucciones);

        return redirect("/procedimientos/tecnicos/{$procedure}");
    }

    public function instructions(TechnicianProcedure $procedure)
    {
        $data = $procedure->steps()->get();

        return response($data,200);
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
