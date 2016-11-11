<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\ApplicationFrotis;
use Illuminate\Http\Request;

class ApplicationFrotisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ApplicationFrotis::fetchAll();
        return view('applications.frotis_radiacion.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.frotis_radiacion.create_frotis');
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
        if($request->input('frotis')==null){
            $request['frotis']=false;
        }else{
            $request['frotis']=true;
        }
        if($request->input('radiation')==null){
            $request['radiation']=false;
        }else{
            $request['radiation']=true;
        }
        flash('Solicitud Registrada', 'success');
        ApplicationFrotis::createSolicitude($request->all());
        return redirect("/servicios/frotis-radiacion/");
    }

}
