<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\CustomerType;
use App\Model\ExternalDosimetry;
use Illuminate\Http\Request;

class ApplicationExternalDosimetryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ExternalDosimetry::fetchAll();
        return view('applications.dosimetry.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CustomerType::orderBy('id','asc')->pluck('name', 'id');
        $actividad = Activity::pluck('name','id');
        return view('applications.dosimetry.create_dosimetry',compact('types','actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['state']=false;
        $tipo = CustomerType::findOrFail($request->input('customer_id'));
        $activi = Activity::findOrFail($request->input('activity_id'));

        if(!$request->has('pd')){
            $request['pd_number']=null;
        }
        if(!$request->has('anillo')){
            $request['anillo_number']=null;
        }
        $request['state']=false;
        flash('Solicitud Registrada', 'success');
        ExternalDosimetry::createSolicitude($request->all(),$tipo, $activi);
        return redirect("/servicios/dosimetria-personal-externa/");
    }

}
