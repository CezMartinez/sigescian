<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\AnnexedFile;
use App\Model\Section;
use App\Model\TechnicianProcedure;
use Illuminate\Http\Request;
use JavaScript;
use Validator;
use App\Http\Requests;

class AdministrativeController extends Controller
{
    /**
     * AdministrativeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
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
        
        $admins = AdministrativeProcedure::fetchAllProceduresByState($state);

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
        $this->validateCreateProcedure($request->all());

        $procedure = AdministrativeProcedure::createNewProcedure($request);

        if($request->has('subsection')){
            $procedure->addSubSections($request->input('subsection'));
        }

        $response = $procedure->addFilesToProcedure($request,4);


        if ($response["status"] != "200") {
            flash($response['message'], 'danger')->important();
            $procedure->delete();
            return back()->withInput();
        }

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
        $administrativo = $administrativo->with(['flowChartFile','annexedFiles'=>function($query){
            $query->orderBy('owner','desc');
        },'formatFiles'=>function ($query){
            $query->orderBy('owner','desc');
        },'section','subSections'])->where('id',$administrativo->id)->first();
        
        JavaScript::put([
            'id_administrative' => $administrativo->id,
            'url_type' => 'administrativo',
        ]);
        $procedures = AdministrativeProcedure::where('id','<>',$administrativo->id)->pluck('name','id');
        
        
        return view('procedures.administrative.administrative_show',compact('administrativo','procedures'));
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
        $sections = Section::pluck('section','id');
        return view('procedures.administrative.administrative_edit',compact('procedure','sections'));
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
        $this->validateUpdateProcedure($request->all(),$administrativo);

        $answer = $administrativo->updateProcedure($request);

        if($answer['status'] != "200") {

            flash($answer['message'], 'danger')->important();

            return back()->withInput();
        }



        flash($answer['message'], 'success');

        return redirect("/procedimientos/administrativos/$administrativo->id");

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
            'name'      => 'required',
            'acronym'   => 'required|unique:administrative_procedures,acronym',
            'file'      => 'required|mimes:pdf,doc,docx',
            'politic'   => 'required'
        ])->validate();
    }

    private function validateUpdateProcedure($data,$procedure){
        $rules = [];
        if(key_exists('file',$data)){
            $rules = [
                'name'      => 'required',
                'file'      => 'required|mimes:pdf,doc,docx',
                'acronym'   => 'unique:administrative_procedures,acronym,'.$procedure->id,
                'politic'   => 'required'
            ];
            return Validator::make($data,$rules)->validate();
        }else{
            $rules = [
                'name'      => 'required',
                'acronym'   => 'unique:administrative_procedures,acronym,'.$procedure->id,
                'politic'   => 'required'
            ];
            return Validator::make($data,$rules)->validate();
        }
    }

    public function versionamiento($procedure_type, $procedure_id)
    {
        if($procedure_type == 'administrativos'){
            $procedures = AdministrativeProcedure::with(['versionate'=>function($query){
                $query->where('procedure_type','App\Model\AdministrativeProcedure');
            }])->where('id',$procedure_id)->get();
        }else{
            $procedures = TechnicianProcedure::with(['versionate'=>function($query){
                $query->where('procedure_type','App\Model\TechnicianProcedure');
            }])->where('id',$procedure_id)->get();
        }

        return view('procedures.versionamiento',compact('procedures'));
    }
    

}
