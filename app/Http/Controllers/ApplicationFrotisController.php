<?php

namespace App\Http\Controllers;

use App\Model\ApplicationFrotis;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationFrotisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(ApplicationFrotis::fetchAll());
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
