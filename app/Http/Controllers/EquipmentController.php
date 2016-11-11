<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Calibration;
use App\Model\Equipment;
use App\Model\Laboratory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class EquipmentController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');

    }

    public function index()
    {
        $equipos = Equipment::fetchAll();
        return view('equipment.equipment_index',compact('equipos','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lab = Laboratory::pluck('name','id');
        return view('equipment.equipment_create', compact('lab'));
    }

    public function show($id){
        $equipo=Equipment::findOrFail($id);
        $lab = Laboratory::findOrFail($equipo->laboratory_id)->name;
        $calibre= Calibration::where('equipment_id',$id)->get();
        $ultimo = $calibre->last();
        $calibre =  Calibration::where('equipment_id',$id)->paginate(5);
        return view('equipment.equipment_show',compact('equipo','lab','ultimo','calibre'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if (Equipment::exists($request->input('name'))) {
            flash('El equipo '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }
        if($request->input('need_calibration')==null){
            $request['need_calibration']=0;
        }else{
            $request['need_calibration']=1;
        }
        $laboratorio= Laboratory::findOrFail($request->input('laboratory_id'));
        flash('Equipo guardado', 'success');
        $equipo=Equipment::createEquipment($request->all(),$laboratorio);
        return redirect("/equipos/{$equipo->id}");
    }

    public function edit($slug)
    {
        $equipments = Equipment::where('slug',$slug)->first();
        $lab = Laboratory::pluck('name','id');
        return view('equipment.equipment_edit',compact('equipments','lab'));
    }

    public function update(Request $request, Equipment $equipo)
    {
        $equipo = $equipo->fill($request->all());
        $this->validator($request->all())->validate();
        dd($equipo);
        if ($equipo->getOriginal('slug') == $equipo->getAttribute('slug')) {
            if($request->input('need_calibration')==null){
                $request['need_calibration']=0;
            }else{
                $request['need_calibration']=1;
            }
            $equipo->update($request->all());
        }
        else{
            if ($equipo->exists($request->input('name'))) {
                flash('El equipo ' . $request->input('name') . ' ya existe', 'danger');
                return back()->withInput();
            }
        }
        if($request->input('need_calibration')==null){
            $request['need_calibration']=0;
        }else{
            $request['need_calibration']=1;
        }
        $laboratorio = Laboratory::findOrFail($request->input('laboratory_id'));

        $equipo->fill($request->all())->laboratory()->dissociate();
        $equipo->laboratory()->associate($laboratorio);
        $equipo->save();
        flash('Equipo ' . $request->input('name') . ' editado correctamente', 'success');
        return redirect('/equipos');
    }

    public function calibrar($slug){
        $equipments = Equipment::where('slug',$slug)->first();
        return view('equipment.equipment_calibration',compact('equipments'));
    }

    public function calibrate(Request $request, $id){
        $equipo=Equipment::findOrFail($id);
        $latest= Calibration::where('equipment_id',$id)->get()->last();
        $validator = "";
        if($latest!=null){
            $validator = $this->validatorCalibrate($request->all(), $latest->getOriginal('date_end_calibration'));
        }else{
            $validator = $this->validatorCalibrate($request->all(), null);
        }

        if ($validator->fails()) {
            return response($validator->getMessageBag()->first('date_calibration'),404);
        }

        Calibration::addCalibration($request->all(),$equipo);
        $response = response("el equipo se calibro correctamente",200);


        return $response;
    }



    public function destroy(Request $request, Equipment $equipos)
    {
        $wasDeleted = $equipos->delete();
        if($request->ajax()){
            if($wasDeleted){
                return response("El equipo: {$equipos->name} fue eliminado",200);
            }else{
                return response("No fue eliminado.",404);
            }
        }

    }

    protected function validatorCalibrate(array $data,$date=null)
    {
        if(is_null($date)){
            return Validator::make($data, [
                'date_calibration'  => "required|before:".Carbon::tomorrow(),
            ]);
        }
        return Validator::make($data, [
            'date_calibration'  => "required|after:{$date}",
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|max:255',
            'brand'             => 'required|max:255',
            'model'             => 'required|max:255',
        ]);
    }
}
