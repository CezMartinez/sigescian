<?php

namespace App\Http\Controllers;

use App\Model\Plant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Requests;

class PlantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plants = Plant::fetchAll();
        return view('plants.plants_index',compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plants.plants_create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if (Plant::exists($request->input('name'))) {
            flash('El equipo '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        $usuario = Auth::user();

        flash('Equipo guardado', 'success');

        Plant::createPlant($request->all(),$usuario);

        return redirect('/equipos');
    }

    public function edit($slug)
    {
        $plants = Plant::where('slug',$slug)->first();
        return view('plants.plants_edit',compact('plants'));
    }

    public function update(Request $request, Plant $equipo)
    {
        $equipo = $equipo->fill($request->all());
        $this->validator($request->all())->validate();

        if($equipo->getOriginal('slug') == $equipo->getAttribute('slug')){
            $equipo->update($request->all());
        }

        elseif($equipo->exists($request->input('name'))){
            flash('Equipo '.$request->input('name').' ya existe!', 'danger');
            return back()->withInput();
        }

        $user = Auth::user();

        $equipo->fill($request->all())->user()->dissociate();
        $equipo->user()->associate($user);

        $equipo->save();

        flash('Equipo '.$request->input('name').' editado correctamente', 'success');


        return redirect('/equipos');
    }


    public function destroy(Request $request, Plant $equipos)
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|max:255',
            'brand'             => 'required|max:255',
            'model'             => 'required|max:255',
            'date_calibration'	=> 'required|after:'.Carbon::today(),
            'date_end_calibration'	=> 'required|after:date_calibration',
        ]);

    }
}
