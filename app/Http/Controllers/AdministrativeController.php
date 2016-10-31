<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\Section;
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
        $administrativo = $administrativo->with(['flowChartFile','annexedFiles','formatFiles','section','subSections'])->where('id',$administrativo->id)->first();
        JavaScript::put([
            'id_administrative' => $administrativo->id,
        ]);
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
        $this->validateUpdateProcedure($request->all(),$administrativo);

        $result = $administrativo->updateProcedure($request);
        
        if($result['hasError']) {
            
            flash($result['message'], 'danger');

            return back()->withInput();
        }
        
        
        flash($result['message'], 'success');


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
            'acronym' => 'required|unique:administrative_procedures,acronym',
            'politic' => 'required'
        ])->validate();
    }

    private function validateUpdateProcedure($data,$procedure){
        return Validator::make($data,[
            'name' => 'required',
            'acronym' => 'unique:administrative_procedures,acronym,'.$procedure->id,
            'politic' => 'required'
        ])->validate();
    }
    

}
