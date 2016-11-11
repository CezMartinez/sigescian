<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Laboratory;
use App\Model\Section;
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
        
        $techs = TechnicianProcedure::fetchAllProceduresByState($state);

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
        $instructions = $request->input('instructions');
        
        $this->validateCreateProcedure($request->all());

        $section = Section::find($request->input('section'));
        
        $laboratory = Laboratory::find($request->input('laboratory_id'));

        $procedure = TechnicianProcedure::createTechnician($request->all(),$section, $laboratory);

        if($request->has('subsection')){
            $procedure->subSections()->attach($request->input('subsection'));
        }
        
        $ids = $procedure->generateInstructions($instructions);

        $procedure->addInstructions($ids);

        $response = $procedure->addFilesToProcedure($request,4);

        if ($response["status"] != "200") {
            flash($response['message'], 'danger')->important();
            $procedure->delete();
            return back()->withInput();
        };

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
        $tecnico = $tecnico->with(['procedureDocument','annexedFiles','formatFiles'=>function($query){
            $query->orderBy('owner','desc');
        },'section'])->where('id',$tecnico->id)->first();

        JavaScript::put([
            'id_tecnico' => $tecnico->id,
            'url_type' => 'tecnico',
        ]);
        $procedures = TechnicianProcedure::where('id','<>',$tecnico->id)->pluck('name','id');
        
        return view('procedures.technician.technician_show',compact('tecnico','subsections','procedures'));
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
        $sections = Section::pluck('section','id');

        JavaScript::put([
            'id_tecnico' => $procedure->id,
        ]);
        
        return view('procedures.technician.technician_edit',compact('procedure','sections'));
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
        $instructions = $request->input('instructions');

        $this->validateUpdateProcedure($request->all(),$tecnico);

        $result = $tecnico->updateProcedure($request,$instructions);

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


    public function instructions(TechnicianProcedure $procedure)
    {
        $data = $procedure->steps()->get();

        return response($data,200);
    }

    private function validateCreateProcedure($data)
    {
        return Validator::make($data,[
            'name'          =>'required',
            'instructions'  => 'required',
            'file'          => 'required|mimes:pdf,doc,docx',
            'acronym'       => 'required|unique:technician_procedures,acronym',
        ])->validate();
    }

    private function validateUpdateProcedure($data,$procedure){
        return Validator::make($data,[
            'name'          => 'required',
            'instructions'  => 'required',
            'file'          => 'mimes:pdf,doc,docx',
            'acronym'       => 'unique:technician_procedures,acronym,'.$procedure->id,
        ])->validate();
    }
    
}
