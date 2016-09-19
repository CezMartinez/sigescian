<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Equipment;
use App\User;
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
        return view('equipment.equipment_create');
    }

    public function show($id){
        $equipo=Equipment::findOrFail($id);
        return view('equipment.equipment_show',compact('equipo'));
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
        flash('Equipo guardado', 'success');
        $equipo=Equipment::createEquipment($request->all());
        return redirect("/equipos/{$equipo->id}");
    }

    public function edit($slug)
    {
        $equipments = Equipment::where('slug',$slug)->first();
        return view('equipment.equipment_edit',compact('equipments'));
    }

    public function update(Request $request, Equipment $equipo)
    {
        $equipo = $equipo->fill($request->all());
        $this->validator($request->all())->validate();

        if ($equipo->getOriginal('slug') == $equipo->getAttribute('slug')) {
            if($request->input('need_calibration')==null){
                $request['need_calibration']=0;
            }else{
                $request['need_calibration']=1;
            }
            $equipo->update($request->all());
        } else {
            if ($equipo->exists($request->input('name'))) {
                flash('El equipo ' . $request->input('name') . ' ya existe', 'danger');

                return back()->withInput();
            }
            if($request->input('need_calibration')==null){
                $request['need_calibration']=0;
            }else{
                $request['need_calibration']=1;
            }
            $equipo-
            flash('Equipo ' . $request->input('name') . ' editado correctamente', 'success');
            $equipo->update($request->all());
        }
        return redirect('/equipos');
    }

    public function calibrar($slug){
        $equipments = Equipment::where('slug',$slug)->first();
        $users = User::getTecnicos()->pluck('full_name','id');
        return view('equipment.equipment_calibration',compact('equipments','users'));
    }

    public function calibrate(Request $request, $id){
        $equipo=Equipment::findOrFail($id);
        $this->validatorCalibrate($request->all(), $equipo->fill($request->all())->getOriginal('date_calibration'))->validate();
        $user=User::findOrFail($request->input('user_id'));
        $equipo->user()->dissociate();
        $equipo->fill($request->all())->user()->associate($user);
        flash('Equipo ' . $equipo->fill($request->all())->name . ' editado correctamente', 'success');
        $equipo->fill($request->all())->update($request->all());
        return redirect('/equipos');
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

    protected function validatorCalibrate(array $data,$date)
    {
        return Validator::make($data, [
            'date_calibration'  => 'required|after:'.$date,
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
